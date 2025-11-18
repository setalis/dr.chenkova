<?php

return [
    'api_url' => env('MONOBANK_API_URL', 'https://api.monobank.ua'),
    'token' => env('MONOBANK_TOKEN'),
    'default_currency' => env('MONOBANK_DEFAULT_CURRENCY', 'UAH'), // Основная валюта для платежей
    'currencies' => [
        'UAH' => [
            'code' => 980,
            'name' => 'Гривна',
            'symbol' => '₴',
            'min_unit' => 'копейка',
        ],
        'USD' => [
            'code' => 840,
            'name' => 'Доллар США',
            'symbol' => '$',
            'min_unit' => 'цент',
        ],
        'EUR' => [
            'code' => 978,
            'name' => 'Евро',
            'symbol' => '€',
            'min_unit' => 'цент',
        ],
    ],
    'paper_book' => [
        'price' => env('PAPER_BOOK_PRICE', 50000), // цена в минимальных единицах валюты (для UAH - копейки, для USD/EUR - центы)
        'name' => env('PAPER_BOOK_NAME', 'Бумажная книга'),
    ],
    'ebook' => [
        'price' => env('EBOOK_PRICE', 30000), // цена в минимальных единицах валюты (для UAH - копейки, для USD/EUR - центы)
        'name' => env('EBOOK_NAME', 'Электронная книга'),
    ],
];
