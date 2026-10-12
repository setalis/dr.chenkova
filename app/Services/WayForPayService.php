<?php

namespace App\Services;

use App\Enums\OrderType;

class WayForPayService
{
    public function buttonUrl(OrderType $type): string
    {
        $url = config('wayforpay.buttons.'.$type->value);

        if (! is_string($url) || $url === '') {
            throw new \RuntimeException('WayForPay button URL is not configured.');
        }

        return $url;
    }

    public function hasSecret(): bool
    {
        $secret = config('wayforpay.secret');

        return is_string($secret) && $secret !== '';
    }

    /**
     * @param  array<string, mixed>  $payload
     */
    public function signatureIsValid(array $payload): bool
    {
        if (! $this->hasSecret()) {
            return true;
        }

        $received = $payload['merchantSignature'] ?? null;

        if (! is_string($received) || $received === '') {
            return false;
        }

        $expected = hash_hmac('md5', implode(';', [
            $payload['merchantAccount'] ?? '',
            $payload['orderReference'] ?? '',
            $payload['amount'] ?? '',
            $payload['currency'] ?? '',
            $payload['authCode'] ?? '',
            $payload['cardPan'] ?? '',
            $payload['transactionStatus'] ?? '',
            $payload['reasonCode'] ?? '',
        ]), (string) config('wayforpay.secret'));

        return hash_equals($expected, $received);
    }
}
