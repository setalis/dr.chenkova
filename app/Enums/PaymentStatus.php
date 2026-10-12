<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case Success = 'success';
    case Failure = 'failure';

    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Ожидает',
            self::Success => 'Оплачен',
            self::Failure => 'Отклонён',
        };
    }

    public function color(): string
    {
        return match ($this) {
            self::Pending => 'amber',
            self::Success => 'green',
            self::Failure => 'red',
        };
    }
}
