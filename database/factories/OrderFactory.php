<?php

namespace Database\Factories;

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $currency = config('monobank.default_currency', 'USD');

        return [
            'type' => OrderType::Paper,
            'locale' => 'ru',
            'invoice_id' => (string) Str::uuid(),
            'name' => fake()->name(),
            'messenger' => 'telegram',
            'contact' => fake()->userName(),
            'country' => fake()->country(),
            'city' => fake()->city(),
            'region' => fake()->state(),
            'address_1' => fake()->streetAddress(),
            'address_2' => null,
            'zip' => fake()->postcode(),
            'phone' => fake()->numerify('+##########'),
            'email' => null,
            'amount' => (int) config('monobank.paper_book.price', 3500),
            'currency' => $currency,
            'currency_info' => config("monobank.currencies.{$currency}"),
            'product_name' => config('monobank.paper_book.name', 'Бумажная книга'),
            'payment_status' => PaymentStatus::Pending,
            'email_sent' => false,
            'email_sent_at' => null,
        ];
    }

    public function paper(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => OrderType::Paper,
            'amount' => (int) config('monobank.paper_book.price', 3500),
            'product_name' => config('monobank.paper_book.name', 'Бумажная книга'),
            'email' => null,
        ]);
    }

    public function ebook(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => OrderType::Ebook,
            'name' => null,
            'messenger' => null,
            'contact' => null,
            'country' => null,
            'city' => null,
            'region' => null,
            'address_1' => null,
            'address_2' => null,
            'zip' => null,
            'phone' => null,
            'email' => fake()->safeEmail(),
            'amount' => (int) config('monobank.ebook.price', 1700),
            'product_name' => config('monobank.ebook.name', 'Электронная книга'),
        ]);
    }

    public function ebookEn(): static
    {
        return $this->state(fn (array $attributes): array => [
            'type' => OrderType::EbookEn,
            'locale' => 'en',
            'name' => null,
            'messenger' => null,
            'contact' => null,
            'country' => null,
            'city' => null,
            'region' => null,
            'address_1' => null,
            'address_2' => null,
            'zip' => null,
            'phone' => null,
            'email' => fake()->safeEmail(),
            'amount' => (int) config('monobank.ebook_en.price', 1700),
            'product_name' => config('monobank.ebook_en.name', 'Электронная книга (English)'),
        ]);
    }

    public function paid(): static
    {
        return $this->state(fn (array $attributes): array => [
            'payment_status' => PaymentStatus::Success,
        ]);
    }
}
