<?php

declare(strict_types=1);

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Livewire\OrdersTable;
use App\Models\Order;
use App\Models\User;
use Livewire\Livewire;

test('dashboard shows orders table for authenticated users', function () {
    $user = User::factory()->create();
    $order = Order::factory()->paper()->create([
        'name' => 'Anna Chenkova',
        'city' => 'Tbilisi',
        'payment_status' => PaymentStatus::Success,
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk()
        ->assertSeeLivewire(OrdersTable::class)
        ->assertSee('Заказы')
        ->assertSee('Anna Chenkova')
        ->assertSee('Tbilisi')
        ->assertSee($order->invoice_id)
        ->assertSee('Оплачен');
});

test('dashboard shows empty state when there are no orders', function () {
    $this->actingAs(User::factory()->create())
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Заказов пока нет');
});

test('orders table search filters by email', function () {
    $this->actingAs(User::factory()->create());

    Order::factory()->ebook()->create([
        'email' => 'keep@example.com',
    ]);
    Order::factory()->ebook()->create([
        'email' => 'hide@example.com',
    ]);

    Livewire::test(OrdersTable::class)
        ->set('search', 'keep@example.com')
        ->assertSee('keep@example.com')
        ->assertDontSee('hide@example.com');
});

test('orders table filters by type and status', function () {
    $this->actingAs(User::factory()->create());

    Order::factory()->paper()->create([
        'name' => 'Paper Buyer',
        'payment_status' => PaymentStatus::Pending,
    ]);
    Order::factory()->ebookEn()->create([
        'email' => 'en-buyer@example.com',
        'payment_status' => PaymentStatus::Success,
    ]);

    Livewire::test(OrdersTable::class)
        ->set('type', OrderType::EbookEn->value)
        ->set('status', PaymentStatus::Success->value)
        ->assertSee('en-buyer@example.com')
        ->assertDontSee('Paper Buyer');
});
