<?php

namespace App\Models;

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use Database\Factories\OrderFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<OrderFactory> */
    use HasFactory;

    protected $fillable = [
        'type',
        'locale',
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

    protected function casts(): array
    {
        return [
            'type' => OrderType::class,
            'currency_info' => 'array',
            'payment_status' => PaymentStatus::class,
            'email_sent' => 'boolean',
            'email_sent_at' => 'datetime',
            'amount' => 'integer',
        ];
    }

    public function isPaperBook(): bool
    {
        return $this->type === OrderType::Paper;
    }

    public function isEbook(): bool
    {
        return $this->type === OrderType::Ebook;
    }

    public function isEnglishEbook(): bool
    {
        return $this->type === OrderType::EbookEn;
    }

    public function isPaymentSuccessful(): bool
    {
        return $this->payment_status === PaymentStatus::Success;
    }

    public function customerDisplay(): string
    {
        if ($this->isPaperBook()) {
            return $this->name ?: '—';
        }

        return $this->email ?: '—';
    }

    public function formattedAmount(): string
    {
        $symbol = is_array($this->currency_info)
            ? ($this->currency_info['symbol'] ?? $this->currency)
            : $this->currency;

        return number_format($this->amount / 100, 2).' '.$symbol;
    }

    /**
     * @return array<string, mixed>
     */
    public function toOrderArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type->value,
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
