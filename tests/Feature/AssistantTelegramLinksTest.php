<?php

declare(strict_types=1);

test('consultation webinar and book buttons link to the assistant telegram', function (string $path, int $minimumLinks) {
    config(['monobank.payments_enabled' => false]);

    $response = $this->get($path);

    $response->assertOk();

    expect(substr_count($response->getContent(), 'https://t.me/drChenkova_Assist'))->toBeGreaterThanOrEqual($minimumLinks);
    expect($response->getContent())->not->toContain('https://t.me/+995557673280');
})->with([
    'ru home' => ['/ru', 2],
    'en home' => ['/en', 2],
    'uk home' => ['/uk', 2],
    'ka home' => ['/ka', 2],
    'ru webinar' => ['/ru/webinar', 9],
    'en webinar' => ['/en/webinar', 9],
    'uk webinar' => ['/uk/webinar', 9],
    'ka webinar' => ['/ka/webinar', 9],
    'ru book' => ['/ru/book', 3],
    'en book' => ['/en/book', 3],
    'uk book' => ['/uk/book', 3],
    'ka book' => ['/ka/book', 3],
    'ru animate book' => ['/ru/animate-book', 2],
    'en animate book' => ['/en/animate-book', 2],
]);
