<?php

namespace App\Livewire;

use App\Enums\OrderType;
use App\Enums\PaymentStatus;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class OrdersTable extends Component
{
    use WithPagination;

    public string $search = '';

    public string $type = '';

    public string $status = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedType(): void
    {
        $this->resetPage();
    }

    public function updatedStatus(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        return view('livewire.orders-table', [
            'orders' => $this->ordersQuery()->latest()->paginate(15),
            'totalCount' => Order::count(),
            'paidCount' => Order::where('payment_status', PaymentStatus::Success)->count(),
            'pendingCount' => Order::where('payment_status', PaymentStatus::Pending)->count(),
            'orderTypes' => OrderType::cases(),
            'paymentStatuses' => PaymentStatus::cases(),
        ]);
    }

    private function ordersQuery(): Builder
    {
        return Order::query()
            ->when($this->search !== '', function (Builder $query): void {
                $search = '%'.$this->search.'%';

                $query->where(function (Builder $query) use ($search): void {
                    $query->where('invoice_id', 'like', $search)
                        ->orWhere('name', 'like', $search)
                        ->orWhere('email', 'like', $search)
                        ->orWhere('phone', 'like', $search)
                        ->orWhere('contact', 'like', $search)
                        ->orWhere('city', 'like', $search);
                });
            })
            ->when($this->type !== '', function (Builder $query): void {
                $query->where('type', $this->type);
            })
            ->when($this->status !== '', function (Builder $query): void {
                $query->where('payment_status', $this->status);
            });
    }
}
