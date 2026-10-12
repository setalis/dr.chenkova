<?php

declare(strict_types=1);

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

test('paper book order store creates pending order and redirects to wayforpay button', function () {
    $response = $this->post('/ru/book-order/store', paperOrderPayload());

    $response->assertRedirect(config('wayforpay.buttons.paper'));

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::Paper)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->locale)->toBe('ru')
        ->and($order->name)->toBe('Anna Chenkova')
        ->and($order->email_sent)->toBeFalse()
        ->and(session('checkout_order_id'))->toBe($order->id);
});

test('russian ebook order store creates pending order and redirects to ebook button', function () {
    $response = $this->post('/ru/ebook-order/store', [
        'email' => 'buyer@example.com',
        'privacy_agreement' => '1',
    ]);

    $response->assertRedirect(config('wayforpay.buttons.ebook'));

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::Ebook)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->email)->toBe('buyer@example.com')
        ->and(session('checkout_order_id'))->toBe($order->id);
});

test('wayforpay return with session marks order success and sends paper book email once', function () {
    $order = Order::factory()->paper()->create([
        'locale' => 'ru',
        'email_sent' => false,
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/payment/wayforpay/return')
        ->assertOk()
        ->assertSee('Заказ успешно оформлен');

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Success)
        ->and($order->email_sent)->toBeTrue()
        ->and($order->email_sent_at)->not->toBeNull();

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(1);
    expect($messages->first()->getOriginalMessage()->getTo()[0]->getAddress())
        ->toBe('mail@dr-chenkova.com');

    $this->get('/payment/wayforpay/return')->assertOk();

    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(1);
    expect($order->fresh()->email_sent)->toBeTrue();
});

test('wayforpay return without session does not change pending order or send email', function () {
    $order = Order::factory()->ebook()->create([
        'payment_status' => PaymentStatus::Pending,
        'email_sent' => false,
    ]);

    $this->get('/payment/wayforpay/return')->assertOk();

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->email_sent)->toBeFalse()
        ->and(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(0);
});

test('wayforpay declined marks pending order as failure without sending email', function () {
    $order = Order::factory()->paper()->create([
        'locale' => 'en',
        'payment_status' => PaymentStatus::Pending,
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/payment/wayforpay/declined')
        ->assertOk()
        ->assertSee('Payment failed');

    $order->refresh();

    expect($order->payment_status)->toBe(PaymentStatus::Failure)
        ->and($order->email_sent)->toBeFalse()
        ->and(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(0);
});

test('russian ebook return sends files email and is idempotent', function () {
    $filesDir = storage_path('app/public/files');
    if (! is_dir($filesDir)) {
        mkdir($filesDir, 0755, true);
    }

    $epubFile = config('monobank.ebook.file_name');
    $epubPath = $filesDir.DIRECTORY_SEPARATOR.$epubFile;
    file_put_contents($epubPath, 'epub-test');

    $order = Order::factory()->ebook()->create([
        'email' => 'buyer@example.com',
        'locale' => 'ru',
    ]);

    session(['checkout_order_id' => $order->id]);

    $this->get('/payment/wayforpay/return')
        ->assertOk()
        ->assertSee('Оплата успешна');

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(1);

    $email = $messages->first()->getOriginalMessage();
    expect($email->getTo()[0]->getAddress())->toBe('buyer@example.com');

    $this->get('/payment/wayforpay/return')->assertOk();
    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(1);

    @unlink($epubPath);
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
