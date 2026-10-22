<?php

declare(strict_types=1);

use App\Models\Order;
use Illuminate\Support\Facades\Http;

test('book pages link to telegram instead of monobank checkout when payments are disabled', function (string $path) {
    config(['monobank.payments_enabled' => false]);

    $response = $this->get($path);

    $response->assertOk();
    $response->assertSee('https://t.me/Alina_Chenkova', false);
    $response->assertSee('bg-teal-600', false);
    $response->assertSee('bg-[#214992]', false);
    $response->assertSee('rounded-full', false);
    $response->assertSee('Заказать книгу за $'.config('monobank.paper_book.price_usd'), false);
    $response->assertSee('Заказать книгу за $'.config('monobank.ebook.price_usd'), false);
    $response->assertDontSee('/ru/book-order/create', false);
    $response->assertDontSee('/ru/ebook-order/create', false);
    $response->assertDontSee('/ru/ebook-en-order/create', false);
})->with([
    'book' => ['/ru/book'],
    'animate book' => ['/ru/animate-book'],
]);

test('book page order button uses the locale label', function (string $locale, string $label) {
    config(['monobank.payments_enabled' => false]);

    $this->get("/{$locale}/book")
        ->assertOk()
        ->assertSee($label.' $'.config('monobank.paper_book.price_usd'), false)
        ->assertSee('bg-teal-600 hover:bg-teal-700', false)
        ->assertSee('bg-[#214992] hover:bg-[#214992]/80', false)
        ->assertSee('rounded-full', false);
})->with([
    'ru' => ['ru', 'Заказать книгу за'],
    'uk' => ['uk', 'Замовити книгу за'],
    'en' => ['en', 'Order the book for'],
    'ka' => ['ka', 'შეუკვეთე წიგნი'],
]);

test('order forms redirect to telegram when monobank payments are disabled', function (string $uri) {
    config(['monobank.payments_enabled' => false]);

    $this->get($uri)->assertRedirect('https://t.me/Alina_Chenkova');
})->with([
    'paper' => ['/ru/book-order/create'],
    'ebook' => ['/ru/ebook-order/create'],
    'english ebook' => ['/ru/ebook-en-order/create'],
]);

test('order store redirects to telegram without calling monobank when payments are disabled', function (string $uri) {
    config(['monobank.payments_enabled' => false]);

    Http::fake();

    $this->post($uri)->assertRedirect('https://t.me/Alina_Chenkova');

    expect(Order::query()->count())->toBe(0);
    Http::assertNothingSent();
})->with([
    'paper' => ['/ru/book-order/store'],
    'ebook' => ['/ru/ebook-order/store'],
    'english ebook' => ['/ru/ebook-en-order/store'],
]);
