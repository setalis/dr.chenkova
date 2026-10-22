<?php

declare(strict_types=1);

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    config(['monobank.payments_enabled' => true]);
});

dataset('book_locales', [
    'ru' => ['ru'],
    'uk' => ['uk'],
    'ka' => ['ka'],
    'en' => ['en'],
]);

test('book pages show english ebook card inside main book section', function (string $locale) {
    $response = $this->get("/{$locale}/book");

    $response->assertOk();
    $response->assertSee('EPUB/PDF/MOBI/FB2');
    $response->assertSee('EPUB/KPF');
    $response->assertSee("/{$locale}/ebook-en-order/create");
    $response->assertDontSee('Книга (English)', false);
})->with('book_locales');

test('english ebook order create page returns 200 for each locale', function (string $locale) {
    $this->get("/{$locale}/ebook-en-order/create")->assertOk();
})->with('book_locales');

test('english ebook order store validates email', function () {
    $response = $this->from('/ru/ebook-en-order/create')
        ->post('/ru/ebook-en-order/store', [
            'privacy_agreement' => '1',
        ]);

    $response->assertRedirect('/ru/ebook-en-order/create');
    $response->assertSessionHasErrors('email');
});

test('english ebook order store creates pending order and redirects to monobank', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/create' => Http::response([
            'invoiceId' => 'inv-en-123',
            'pageUrl' => 'https://pay.monobank.ua/ebook-en',
        ], 200),
    ]);

    $response = $this->post('/ru/ebook-en-order/store', [
        'email' => 'buyer@example.com',
        'privacy_agreement' => '1',
    ]);

    $response->assertRedirect('https://pay.monobank.ua/ebook-en');

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::EbookEn)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->invoice_id)->toBe('inv-en-123')
        ->and($order->email)->toBe('buyer@example.com')
        ->and($order->locale)->toBe('ru')
        ->and($order->amount)->toBe(config('monobank.ebook_en.price'))
        ->and($order->email_sent)->toBeFalse()
        ->and(session('checkout_order_id'))->toBe($order->id);

    $email = Mail::mailer()->getSymfonyTransport()->messages()->first()->getOriginalMessage();
    expect($email->getTo()[0]->getAddress())->toBe('mail@dr-chenkova.com');
    expect($email->getSubject())->toBe('Заказ книги: Ожидает оплаты');
});

test('english ebook payment success sends email with epub and kpf attachments', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/status*' => Http::response([
            'status' => 'success',
        ], 200),
    ]);
    $filesDir = storage_path('app/public/files');
    if (! is_dir($filesDir)) {
        mkdir($filesDir, 0755, true);
    }

    $epubFile = config('monobank.ebook_en.epub_file_name');
    $kpfFile = config('monobank.ebook_en.kpf_file_name');
    $epubPath = $filesDir.DIRECTORY_SEPARATOR.$epubFile;
    $kpfPath = $filesDir.DIRECTORY_SEPARATOR.$kpfFile;

    file_put_contents($epubPath, 'epub-test');
    file_put_contents($kpfPath, 'kpf-test');

    $order = Order::factory()->ebookEn()->create([
        'email' => 'buyer@example.com',
        'locale' => 'en',
        'payment_status' => PaymentStatus::Pending,
    ]);

    session(['checkout_order_id' => $order->id]);

    $response = $this->get('/en/ebook-en-order/payment-success');

    $response->assertOk();
    $response->assertSee('Payment successful');
    $response->assertSee('EPUB');
    $response->assertSee('KPF');

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(2);

    $buyerEmail = $messages->first(fn ($message) => $message->getOriginalMessage()->getTo()[0]->getAddress() === 'buyer@example.com')->getOriginalMessage();
    expect($buyerEmail->getSubject())->toBe('Your English e-book files');

    $adminEmail = $messages->first(fn ($message) => $message->getOriginalMessage()->getTo()[0]->getAddress() === 'mail@dr-chenkova.com')->getOriginalMessage();
    expect($adminEmail->getSubject())->toBe('Заказ книги: Оплачено');
    expect($adminEmail->getHtmlBody())->toContain('Оплачено');

    $attachmentNames = collect($buyerEmail->getAttachments())
        ->map(fn ($attachment) => $attachment->getName())
        ->all();

    expect($attachmentNames)->toContain($epubFile);
    expect($attachmentNames)->toContain($kpfFile);

    $order->refresh();
    expect($order->payment_status)->toBe(PaymentStatus::Success)
        ->and($order->email_sent)->toBeTrue()
        ->and(session('ebook_en_order_download.invoice_id'))->toBe($order->invoice_id);

    $this->get('/en/ebook-en-order/payment-success')->assertOk();
    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(2);

    @unlink($epubPath);
    @unlink($kpfPath);
});
