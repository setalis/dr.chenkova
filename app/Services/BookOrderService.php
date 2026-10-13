<?php

namespace App\Services;

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use RuntimeException;

class BookOrderService
{
    /**
     * @return array{amount: int, currency: string, currency_code: int, product_name: string}
     */
    public function quote(OrderType $type): array
    {
        [$currency, $currencyInfo] = $this->currency();
        $product = $this->product($type);

        return [
            'amount' => (int) $product['price'],
            'currency' => $currency,
            'currency_code' => (int) $currencyInfo['code'],
            'product_name' => $product['name'],
        ];
    }

    /**
     * @param  array<string, mixed>  $attributes
     */
    public function createPendingOrder(OrderType $type, array $attributes, string $invoiceId): Order
    {
        $quote = $this->quote($type);

        $order = Order::create([
            ...$attributes,
            'type' => $type,
            'invoice_id' => $invoiceId,
            'locale' => app()->getLocale(),
            'amount' => $quote['amount'],
            'currency' => $quote['currency'],
            'currency_info' => config('monobank.currencies.'.$quote['currency']),
            'product_name' => $quote['product_name'],
            'payment_status' => PaymentStatus::Pending,
            'email_sent' => false,
        ]);

        $this->notifyAdmin($order);

        return $order;
    }

    public function fulfill(Order $order): Order
    {
        if ($order->payment_status === PaymentStatus::Failure) {
            return $order;
        }

        if ($order->payment_status === PaymentStatus::Pending) {
            $order->payment_status = PaymentStatus::Success;
            $order->save();
            $this->notifyAdmin($order);
        }

        if (! $order->email_sent) {
            $this->sendFulfillmentEmail($order);
        }

        return $order->fresh() ?? $order;
    }

    public function markFailed(Order $order): Order
    {
        if ($order->payment_status === PaymentStatus::Pending) {
            $order->payment_status = PaymentStatus::Failure;
            $order->save();
        }

        return $order->fresh() ?? $order;
    }

    /**
     * @return array{0: string, 1: array<string, mixed>}
     */
    private function currency(): array
    {
        $currency = config('monobank.default_currency', 'UAH');
        $currencyInfo = config("monobank.currencies.{$currency}");

        if (! is_array($currencyInfo)) {
            throw new RuntimeException('Currency not found in config.');
        }

        return [$currency, $currencyInfo];
    }

    /**
     * @return array{price: int|string, name: string}
     */
    private function product(OrderType $type): array
    {
        $configKey = match ($type) {
            OrderType::Paper => 'monobank.paper_book',
            OrderType::Ebook => 'monobank.ebook',
            OrderType::EbookEn => 'monobank.ebook_en',
        };

        /** @var array{price?: int|string, name?: string} $product */
        $product = config($configKey, []);

        return [
            'price' => $product['price'] ?? 0,
            'name' => $product['name'] ?? $type->value,
        ];
    }

    private function sendFulfillmentEmail(Order $order): void
    {
        $locale = $order->locale ?: 'ru';
        app()->setLocale($locale);

        try {
            if ($order->isPaperBook()) {
                $order->email_sent = true;
                $order->email_sent_at = now();
                $order->save();

                return;
            }

            if ($order->isEbook()) {
                $this->sendEbookEmail($order, $locale);
            } elseif ($order->isEnglishEbook()) {
                $this->sendEnglishEbookEmail($order, $locale);
            } else {
                return;
            }

            $order->email_sent = true;
            $order->email_sent_at = now();
            $order->save();
        } catch (\Exception $e) {
            Log::error('Error sending order email', [
                'order_id' => $order->id,
                'invoice_id' => $order->invoice_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function notifyAdmin(Order $order): void
    {
        $status = $order->payment_status === PaymentStatus::Success ? 'success' : 'pending';
        $subject = $status === 'success'
            ? 'Заказ книги: Оплачено'
            : 'Заказ книги: Ожидает оплаты';

        try {
            Mail::send('emails.book-order', [
                'order' => $order->toOrderArray(),
                'status' => $status,
            ], function ($message) use ($subject) {
                $message->to('mail@dr-chenkova.com')
                    ->subject($subject);
            });
        } catch (\Exception $e) {
            Log::error('Error sending admin order email', [
                'order_id' => $order->id,
                'invoice_id' => $order->invoice_id,
                'status' => $status,
                'error' => $e->getMessage(),
            ]);
        }
    }

    private function sendEbookEmail(Order $order, string $locale): void
    {
        if (! $order->email) {
            return;
        }

        $subject = $locale === 'uk'
            ? 'Ваші файли електронної книги'
            : 'Ваши файлы электронной книги';

        $emailView = 'emails.ebook-files';
        if ($locale === 'uk' && view()->exists('emails.ebook-files-uk')) {
            $emailView = 'emails.ebook-files-uk';
        } elseif ($locale !== 'ru' && view()->exists("emails.ebook-files-{$locale}")) {
            $emailView = "emails.ebook-files-{$locale}";
        }

        $orderData = $order->toOrderArray();

        Mail::send($emailView, [
            'order' => $orderData,
            'locale' => $locale,
        ], function ($message) use ($orderData, $subject) {
            $message->to($orderData['email'])
                ->subject($subject);

            $filesDir = storage_path('app/public/files/');

            foreach ([
                config('monobank.ebook.file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.epub'),
                config('monobank.ebook.pdf_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf'),
                config('monobank.ebook.mobi_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.mobi'),
                config('monobank.ebook.fb2_file_name', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.fb2'),
            ] as $fileName) {
                $filePath = $filesDir.$fileName;
                if (is_string($fileName) && $fileName !== '' && file_exists($filePath)) {
                    $message->attach($filePath, ['as' => $fileName]);
                }
            }
        });
    }

    private function sendEnglishEbookEmail(Order $order, string $locale): void
    {
        if (! $order->email) {
            return;
        }

        $subject = match ($locale) {
            'uk' => 'Ваші файли англійської електронної книги',
            'en' => 'Your English e-book files',
            'ka' => 'თქვენი ინგლისური ელექტრონული წიგნის ფაილები',
            default => 'Ваши файлы английской электронной книги',
        };

        $emailView = 'emails.ebook-en-files';
        if ($locale !== 'ru' && view()->exists("emails.ebook-en-files-{$locale}")) {
            $emailView = "emails.ebook-en-files-{$locale}";
        }

        $orderData = $order->toOrderArray();

        Mail::send($emailView, [
            'order' => $orderData,
            'locale' => $locale,
        ], function ($message) use ($orderData, $subject) {
            $message->to($orderData['email'])
                ->subject($subject);

            $filesDir = storage_path('app/public/files/');

            foreach ([
                config('monobank.ebook_en.epub_file_name', 'Skin_for_Life_Alina_Chenkova.epub'),
                config('monobank.ebook_en.kpf_file_name', 'Skin_for_Life_Alina_Chenkova.kpf'),
            ] as $fileName) {
                $filePath = $filesDir.$fileName;
                if (is_string($fileName) && $fileName !== '' && file_exists($filePath)) {
                    $message->attach($filePath, ['as' => $fileName]);
                }
            }
        });
    }
}
