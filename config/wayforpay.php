<?php

return [
    'secret' => env('WAYFORPAY_SECRET'),

    'buttons' => [
        'paper' => env('WAYFORPAY_BUTTON_PAPER', 'https://secure.wayforpay.com/button/b52a1489d4643'),
        'ebook' => env('WAYFORPAY_BUTTON_EBOOK', 'https://secure.wayforpay.com/button/bc7835932c330'),
        'ebook_en' => env('WAYFORPAY_BUTTON_EBOOK_EN', 'https://secure.wayforpay.com/button/bc7835932c330'),
    ],
];
