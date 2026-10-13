<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MonobankService
{
    private readonly string $apiUrl;

    private readonly string $token;

    public function __construct()
    {
        $this->apiUrl = config('monobank.api_url', 'https://api.monobank.ua');
        $this->token = config('monobank.token');
    }

    public function createInvoice(int $amount, string $redirectUrl, ?string $webhookUrl = null, ?string $productName = null, int $currency = 980): array
    {
        $payload = [
            'amount' => $amount,
            'ccy' => $currency, // ISO 4217 код валюты (980 - UAH, 840 - USD, 978 - EUR)
            'redirectUrl' => $redirectUrl,
        ];

        if ($webhookUrl) {
            $payload['webHookUrl'] = $webhookUrl;
        }

        if ($productName) {
            $payload['merchantPaymInfo'] = [
                'reference' => $productName,
                'destination' => $productName,
            ];
        }

        try {
            $response = Http::withHeaders([
                'X-Token' => $this->token,
            ])->post("{$this->apiUrl}/api/merchant/invoice/create", $payload);

            if ($response->successful()) {
                return $response->json();
            }

            Log::error('Monobank API error', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new \RuntimeException('Ошибка при создании инвойса в Monobank: '.$response->body());
        } catch (\Exception $e) {
            Log::error('Monobank API exception', [
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    public function getInvoiceStatus(string $invoiceId): array
    {
        try {
            $response = Http::withHeaders([
                'X-Token' => $this->token,
            ])->get("{$this->apiUrl}/api/merchant/invoice/status", [
                'invoiceId' => $invoiceId,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                Log::info('Monobank invoice status', [
                    'invoice_id' => $invoiceId,
                    'status' => $data['status'] ?? 'unknown',
                    'data' => $data,
                ]);

                return $data;
            }

            Log::error('Monobank API error - status check', [
                'invoice_id' => $invoiceId,
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            throw new \RuntimeException('Ошибка при проверке статуса инвойса в Monobank: '.$response->body());
        } catch (\Exception $e) {
            Log::error('Monobank API exception - status check', [
                'invoice_id' => $invoiceId,
                'message' => $e->getMessage(),
            ]);

            throw $e;
        }
    }

    public function verifyWebhookSignature(Request $request): bool
    {
        $sign = $request->header('X-Sign');

        if (! is_string($sign) || $sign === '') {
            return false;
        }

        try {
            $pubKeyResponse = Http::get($this->apiUrl.'/api/merchant/pubkey');

            if (! $pubKeyResponse->successful()) {
                Log::error('Failed to fetch Monobank public key', ['status' => $pubKeyResponse->status()]);

                return false;
            }

            $pubKey = $pubKeyResponse->json()['key'] ?? null;

            if (! is_string($pubKey) || $pubKey === '') {
                return false;
            }

            $signature = base64_decode($sign, true);

            if ($signature === false) {
                return false;
            }

            return openssl_verify($request->getContent(), $signature, $pubKey, OPENSSL_ALGO_SHA256) === 1;
        } catch (\Exception $e) {
            Log::error('Monobank webhook signature verification failed', ['error' => $e->getMessage()]);

            return false;
        }
    }
}
