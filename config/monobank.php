<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Monobank API Configuration
    |--------------------------------------------------------------------------
    |
    | Настройки для работы с API Monobank
    |
    */

    'api_url' => env('MONOBANK_API_URL', 'https://api.monobank.ua'),
    'token' => env('MONOBANK_TOKEN'),

    'default_currency' => env('MONOBANK_DEFAULT_CURRENCY', 'UAH'),

    'currencies' => [
        'UAH' => [
            'code' => 980,
            'name' => 'Гривня',
            'symbol' => '₴',
        ],
        'USD' => [
            'code' => 840,
            'name' => 'Доллар США',
            'symbol' => '$',
        ],
        'EUR' => [
            'code' => 978,
            'name' => 'Евро',
            'symbol' => '€',
        ],
    ],

    'paper_book' => [
        'price' => env('MONOBANK_PAPER_BOOK_PRICE', 3500), // в копейках
        'name' => env('MONOBANK_PAPER_BOOK_NAME', 'Бумажная книга'),
    ],

    'ebook' => [
        'price' => env('MONOBANK_EBOOK_PRICE', 1700), // в копейках
        'name' => env('MONOBANK_EBOOK_NAME', 'Электронная книга'),
        'file_name' => env('MONOBANK_EBOOK_FILE_NAME', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.epub'),
        'pdf_file_name' => env('MONOBANK_EBOOK_PDF_FILE_NAME', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf'),
        'excerpt_file_name' => env('MONOBANK_EBOOK_EXCERPT_FILE_NAME', 'excerpt-book.pdf'), // Файл отрывка для предпросмотра (если null, используется pdf_file_name)
        'mobi_file_name' => env('MONOBANK_EBOOK_MOBI_FILE_NAME', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.mobi'),
        'fb2_file_name' => env('MONOBANK_EBOOK_FB2_FILE_NAME', 'Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.fb2'),
    ],
];

