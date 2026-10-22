<?php

declare(strict_types=1);

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use App\Services\MonobankService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    config(['monobank.payments_enabled' => true]);
});

test('paper book order store creates pending order and redirects to monobank', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/create' => Http::response([
            'invoiceId' => 'inv-paper-1',
            'pageUrl' => 'https://pay.monobank.ua/paper',
        ], 200),
    ]);

    $response = $this->post('/ru/book-order/store', paperOrderPayload());

    $response->assertRedirect('https://pay.monobank.ua/paper');

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::Paper)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->invoice_id)->toBe('inv-paper-1')
        ->and($order->locale)->toBe('ru')
        ->and($order->name)->toBe('Anna Chenkova')
        ->and($order->email_sent)->toBeFalse()
        ->and(session('checkout_order_id'))->toBe($order->id);

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(1);

    $email = $messages->first()->getOriginalMessage();
    expect($email->getTo()[0]->getAddress())->toBe('mail@dr-chenkova.com');
    expect($email->getSubject())->toBe('Заказ книги: Ожидает оплаты');
    expect($email->getHtmlBody())->toContain('Ожидает оплаты');
});

test('russian ebook order store creates pending order and redirects to monobank', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/create' => Http::response([
            'invoiceId' => 'inv-ebook-1',
            'pageUrl' => 'https://pay.monobank.ua/ebook',
        ], 200),
    ]);

    $response = $this->post('/ru/ebook-order/store', [
        'email' => 'buyer@example.com',
        'privacy_agreement' => '1',
    ]);

    $response->assertRedirect('https://pay.monobank.ua/ebook');

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::Ebook)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->invoice_id)->toBe('inv-ebook-1')
        ->and($order->email)->toBe('buyer@example.com')
        ->and($order->email_sent)->toBeFalse()
        ->and(session('checkout_order_id'))->toBe($order->id);

    $email = Mail::mailer()->getSymfonyTransport()->messages()->first()->getOriginalMessage();
    expect($email->getTo()[0]->getAddress())->toBe('mail@dr-chenkova.com');
    expect($email->getSubject())->toBe('Заказ книги: Ожидает оплаты');
    expect($email->getHtmlBody())->toContain('buyer@example.com');
});

test('monobank payment success marks order paid and sends paper book email once', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/status*' => Http::response([
            'status' => 'success',
            'invoiceId' => 'inv-paper-success',
        ], 200),
    ]);

    $order = Order::factory()->paper()->create([
        'invoice_id' => 'inv-paper-success',
        'locale' => 'ru',
        'email_sent' => false,
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/ru/book-order/payment-success')
        ->assertOk()
        ->assertSee('Заказ успешно оформлен');

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Success)
        ->and($order->email_sent)->toBeTrue()
        ->and($order->email_sent_at)->not->toBeNull();

    $paidEmail = Mail::mailer()->getSymfonyTransport()->messages()->first()->getOriginalMessage();
    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(1);
    expect($paidEmail->getTo()[0]->getAddress())->toBe('mail@dr-chenkova.com');
    expect($paidEmail->getSubject())->toBe('Заказ книги: Оплачено');
    expect($paidEmail->getHtmlBody())->toContain('Оплачено');

    $this->get('/ru/book-order/payment-success')->assertOk();

    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(1);
    expect($order->fresh()->email_sent)->toBeTrue();
});

test('payment success without session does not change pending order or send email', function () {
    config(['monobank.token' => 'test-token']);

    $order = Order::factory()->ebook()->create([
        'payment_status' => PaymentStatus::Pending,
        'email_sent' => false,
    ]);

    $this->get('/ru/book-order/payment-success')->assertOk();

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->email_sent)->toBeFalse()
        ->and(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(0);
});

test('failed monobank status marks order as failure without sending email', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/status*' => Http::response([
            'status' => 'failure',
            'invoiceId' => 'inv-paper-fail',
        ], 200),
    ]);

    $order = Order::factory()->paper()->create([
        'invoice_id' => 'inv-paper-fail',
        'locale' => 'en',
        'payment_status' => PaymentStatus::Pending,
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/en/book-order/payment-success')
        ->assertOk()
        ->assertSee('Payment failed');

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Failure)
        ->and($order->email_sent)->toBeFalse()
        ->and(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(0);
});

test('russian ebook payment success sends files email and is idempotent', function () {
    config(['monobank.token' => 'test-token']);

    $filesDir = storage_path('app/public/files');
    if (! is_dir($filesDir)) {
        mkdir($filesDir, 0755, true);
    }

    $epubFile = config('monobank.ebook.file_name');
    $epubPath = $filesDir.DIRECTORY_SEPARATOR.$epubFile;
    file_put_contents($epubPath, 'epub-test');

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/status*' => Http::response([
            'status' => 'success',
        ], 200),
    ]);

    $order = Order::factory()->ebook()->create([
        'email' => 'buyer@example.com',
        'locale' => 'ru',
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/ru/ebook-order/payment-success')
        ->assertOk()
        ->assertSee('Оплата успешна');

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(2);

    $recipients = $messages->map(fn ($message) => $message->getOriginalMessage()->getTo()[0]->getAddress())->all();
    expect($recipients)->toContain('buyer@example.com');
    expect($recipients)->toContain('mail@dr-chenkova.com');

    $adminEmail = $messages->first(fn ($message) => $message->getOriginalMessage()->getTo()[0]->getAddress() === 'mail@dr-chenkova.com')->getOriginalMessage();
    expect($adminEmail->getSubject())->toBe('Заказ книги: Оплачено');

    $this->get('/ru/ebook-order/payment-success')->assertOk();
    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(2);

    @unlink($epubPath);
});

test('monobank webhook fulfills a pending order', function () {
    $order = Order::factory()->ebook()->create([
        'invoice_id' => 'inv-webhook-1',
        'email' => 'buyer@example.com',
        'payment_status' => PaymentStatus::Pending,
    ]);

    $this->mock(MonobankService::class, function ($mock): void {
        $mock->shouldReceive('verifyWebhookSignature')->once()->andReturn(true);
    });

    $this->post('/ebook-order/webhook', [
        'invoiceId' => 'inv-webhook-1',
        'status' => 'success',
    ])->assertOk();

    expect($order->fresh()->payment_status)->toBe(PaymentStatus::Success)
        ->and($order->fresh()->email_sent)->toBeTrue();
});

test('monobank webhook with invalid signature is rejected', function () {
    $order = Order::factory()->paper()->create([
        'payment_status' => PaymentStatus::Pending,
    ]);

    $this->mock(MonobankService::class, function ($mock): void {
        $mock->shouldReceive('verifyWebhookSignature')->once()->andReturn(false);
    });

    $this->post('/book-order/webhook', [
        'invoiceId' => $order->invoice_id,
        'status' => 'success',
    ])->assertForbidden();

    expect($order->fresh()->payment_status)->toBe(PaymentStatus::Pending)
        ->and(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(0);
});

/**
 * @return array<string, string>
 */
function paperOrderPayload(): array
{
    return [
        'name' => 'Anna Chenkova',
        'messenger' => 'telegram',
        'contact' => '@chenkova',
        'country' => 'Georgia',
        'city' => 'Tbilisi',
        'region' => 'Tbilisi',
        'address_1' => 'Rustaveli 1',
        'zip' => '0108',
        'phone' => '+995555000000',
        'privacy_agreement' => '1',
    ];
}
