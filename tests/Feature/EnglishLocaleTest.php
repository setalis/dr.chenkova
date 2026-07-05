<?php

declare(strict_types=1);

test('en home page returns 200', function () {
    $this->get('/en/')->assertOk();
});

test('en about page returns 200', function () {
    $this->get('/en/about')->assertOk();
});

test('en acne page returns 200', function () {
    $this->get('/en/acne')->assertOk();
});

test('en webinar page returns 200', function () {
    $this->get('/en/webinar')->assertOk();
});

test('en lessons page returns 200', function () {
    $this->get('/en/lessons')->assertOk();
});

test('en guide page returns 200', function () {
    $this->get('/en/guide')->assertOk();
});

test('en book page returns 200', function () {
    $this->get('/en/book')->assertOk();
});

test('en contact page returns 200', function () {
    $this->get('/en/contact')->assertOk();
});

test('en legal-info page returns 200', function () {
    $this->get('/en/legal-info')->assertOk();
});

test('en privacy-policy page returns 200', function () {
    $this->get('/en/privacy-policy')->assertOk();
});

test('en book order create page returns 200', function () {
    $this->get('/en/book-order/create')->assertOk();
});

test('en ebook order create page returns 200', function () {
    $this->get('/en/ebook-order/create')->assertOk();
});

test('language switcher contains Eng option', function () {
    $response = $this->get('/en/');

    $response->assertOk();
    $response->assertSee('Eng');
});

test('en locale sets application locale to en', function () {
    $this->get('/en/');

    expect(app()->getLocale())->toBe('en');
});

test('en header shows English navigation labels', function () {
    $response = $this->get('/en/');

    $response->assertOk();
    $response->assertSee('Home');
    $response->assertSee('About Acne');
    $response->assertSee('Guides');
    $response->assertSee('Book');
});
