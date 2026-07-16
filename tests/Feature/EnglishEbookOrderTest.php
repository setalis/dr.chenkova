<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Http;
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

test('english ebook order store creates monobank invoice and redirects', function () {
    config(['monobank.token' => 'test-token']);

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/create' => Http::response([
            'invoiceId' => 'inv-en-123',
            'pageUrl' => 'https://pay.monobank.ua/test-en',
        ], 200),
    ]);

    $response = $this->post('/ru/ebook-en-order/store', [
        'email' => 'buyer@example.com',
        'privacy_agreement' => '1',
    ]);

    $response->assertRedirect('https://pay.monobank.ua/test-en');
    expect(session('ebook_en_order.type'))->toBe('ebook_en');
    expect(session('ebook_en_order.email'))->toBe('buyer@example.com');
    expect(session('ebook_en_order.invoice_id'))->toBe('inv-en-123');
    expect(session('ebook_en_order.amount'))->toBe(config('monobank.ebook_en.price'));
});

test('english ebook payment success sends email with epub and kpf attachments', function () {
    config([
        'monobank.token' => 'test-token',
        'mail.default' => 'array',
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

    Http::fake([
        'https://api.monobank.ua/api/merchant/invoice/status*' => Http::response([
            'status' => 'success',
            'invoiceId' => 'inv-en-success',
        ], 200),
    ]);

    session([
        'ebook_en_order' => [
            'type' => 'ebook_en',
            'email' => 'buyer@example.com',
            'invoice_id' => 'inv-en-success',
            'amount' => config('monobank.ebook_en.price'),
            'currency' => 'UAH',
            'currency_info' => config('monobank.currencies.UAH'),
            'product_name' => config('monobank.ebook_en.name'),
        ],
    ]);

    $response = $this->get('/en/ebook-en-order/payment-success');

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
    expect(session('ebook_en_order_download.invoice_id'))->toBe('inv-en-success');

    @unlink($epubPath);
    @unlink($kpfPath);
});
