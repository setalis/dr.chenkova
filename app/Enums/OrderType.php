<?php

namespace App\Enums;

enum OrderType: string
{
    case Paper = 'paper';
    case Ebook = 'ebook';
    case EbookEn = 'ebook_en';

    public function label(): string
    {
        return match ($this) {
            self::Paper => 'Бумажная',
            self::Ebook => 'Электронная',
            self::EbookEn => 'English ebook',
        };
    }
}
