<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'type',
        'invoice_id',
        'name',
        'messenger',
        'contact',
        'country',
        'city',
        'region',
        'address_1',
        'address_2',
        'zip',
        'phone',
        'email',
        'amount',
        'currency',
        'currency_info',
        'product_name',
        'payment_status',
        'email_sent',
        'email_sent_at',
    ];

    protected $casts = [
        'currency_info' => 'array',
        'email_sent' => 'boolean',
        'email_sent_at' => 'datetime',
        'amount' => 'integer',
    ];

    /**
     * Проверка, является ли заказ заказом бумажной книги
     */
    public function isPaperBook(): bool
    {
        return $this->type === 'paper';
    }

    /**
     * Проверка, является ли заказ заказом электронной книги
     */
    public function isEbook(): bool
    {
        return $this->type === 'ebook';
    }

    /**
     * Проверка, был ли платеж успешным
     */
    public function isPaymentSuccessful(): bool
    {
        return $this->payment_status === 'success';
    }

    /**
     * Получить данные заказа в формате массива (для совместимости с текущим кодом)
     */
    public function toOrderArray(): array
    {
        return [
            'type' => $this->type,
            'invoice_id' => $this->invoice_id,
            'name' => $this->name,
            'messenger' => $this->messenger,
            'contact' => $this->contact,
            'country' => $this->country,
            'city' => $this->city,
            'region' => $this->region,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'zip' => $this->zip,
            'phone' => $this->phone,
            'email' => $this->email,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'currency_info' => $this->currency_info,
            'product_name' => $this->product_name,
        ];
    }
}







