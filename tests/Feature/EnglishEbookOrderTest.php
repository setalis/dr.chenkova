<?php

declare(strict_types=1);

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;

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

test('english ebook order store creates pending order and redirects to the russian ebook button', function () {
    $response = $this->post('/ru/ebook-en-order/store', [
        'email' => 'buyer@example.com',
        'privacy_agreement' => '1',
    ]);

    $ebookButton = config('wayforpay.buttons.ebook');

    $response->assertRedirect($ebookButton);
    expect(config('wayforpay.buttons.ebook_en'))->toBe($ebookButton);

    $order = Order::first();

    expect($order)->not->toBeNull()
        ->and($order->type)->toBe(OrderType::EbookEn)
        ->and($order->payment_status)->toBe(PaymentStatus::Pending)
        ->and($order->email)->toBe('buyer@example.com')
        ->and($order->locale)->toBe('ru')
        ->and($order->amount)->toBe(config('monobank.ebook_en.price'))
        ->and(session('checkout_order_id'))->toBe($order->id);
});

test('english ebook payment return sends email with epub and kpf attachments', function () {
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

    $response = $this->get('/payment/wayforpay/return');

    $response->assertOk();
    $response->assertSee('Payment successful');
    $response->assertSee('EPUB');
    $response->assertSee('KPF');

    $messages = Mail::mailer()->getSymfonyTransport()->messages();
    expect($messages)->toHaveCount(1);

    $email = $messages->first()->getOriginalMessage();
    expect($email->getTo()[0]->getAddress())->toBe('buyer@example.com');
    expect($email->getSubject())->toBe('Your English e-book files');

    $attachmentNames = collect($email->getAttachments())
        ->map(fn ($attachment) => $attachment->getName())
        ->all();

    expect($attachmentNames)->toContain($epubFile);
    expect($attachmentNames)->toContain($kpfFile);

    $order->refresh();
    expect($order->payment_status)->toBe(PaymentStatus::Success)
        ->and($order->email_sent)->toBeTrue()
        ->and(session('ebook_en_order_download.invoice_id'))->toBe($order->invoice_id);

    $this->get('/payment/wayforpay/return')->assertOk();
    expect(Mail::mailer()->getSymfonyTransport()->messages())->toHaveCount(1);

    @unlink($epubPath);
    @unlink($kpfPath);
});
