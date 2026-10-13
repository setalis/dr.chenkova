<div class="flex flex-col gap-6">
    <div>
        <flux:heading size="xl">Заказы</flux:heading>
        <flux:text class="mt-1">Оплаты книги через Monobank</flux:text>
    </div>

    <div class="grid gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
            <flux:text class="text-sm">Всего</flux:text>
            <flux:heading size="lg">{{ $totalCount }}</flux:heading>
        </div>
        <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
            <flux:text class="text-sm">Оплачено</flux:text>
            <flux:heading size="lg">{{ $paidCount }}</flux:heading>
        </div>
        <div class="rounded-xl border border-neutral-200 p-4 dark:border-neutral-700">
            <flux:text class="text-sm">Ожидают</flux:text>
            <flux:heading size="lg">{{ $pendingCount }}</flux:heading>
        </div>
    </div>

    <div class="flex flex-col gap-4 md:flex-row">
        <div class="grow">
            <flux:input
                wire:model.live.debounce.300ms="search"
                placeholder="Поиск по имени, email, телефону, номеру заказа"
            />
        </div>
        <flux:select wire:model.live="type">
            <flux:select.option value="">Все типы</flux:select.option>
            @foreach ($orderTypes as $orderType)
                <flux:select.option :value="$orderType->value">{{ $orderType->label() }}</flux:select.option>
            @endforeach
        </flux:select>
        <flux:select wire:model.live="status">
            <flux:select.option value="">Все статусы</flux:select.option>
            @foreach ($paymentStatuses as $paymentStatus)
                <flux:select.option :value="$paymentStatus->value">{{ $paymentStatus->label() }}</flux:select.option>
            @endforeach
        </flux:select>
    </div>

    <div class="overflow-x-auto rounded-xl border border-neutral-200 dark:border-neutral-700">
        <table class="min-w-full text-left text-sm">
            <thead class="border-b border-neutral-200 bg-neutral-50 text-neutral-600 dark:border-neutral-700 dark:bg-neutral-800 dark:text-neutral-300">
                <tr>
                    <th class="px-4 py-3 font-medium">Дата</th>
                    <th class="px-4 py-3 font-medium">Тип</th>
                    <th class="px-4 py-3 font-medium">Клиент</th>
                    <th class="px-4 py-3 font-medium">Контакт</th>
                    <th class="px-4 py-3 font-medium">Доставка</th>
                    <th class="px-4 py-3 font-medium">Сумма</th>
                    <th class="px-4 py-3 font-medium">Статус</th>
                    <th class="px-4 py-3 font-medium">Письмо</th>
                    <th class="px-4 py-3 font-medium">Номер</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-neutral-200 dark:divide-neutral-700">
                @forelse ($orders as $order)
                    <tr wire:key="order-{{ $order->id }}" class="text-neutral-900 dark:text-neutral-100">
                        <td class="whitespace-nowrap px-4 py-3">{{ $order->created_at?->format('d.m.Y H:i') }}</td>
                        <td class="whitespace-nowrap px-4 py-3">{{ $order->type->label() }}</td>
                        <td class="px-4 py-3">{{ $order->customerDisplay() }}</td>
                        <td class="px-4 py-3">
                            @if ($order->isPaperBook())
                                {{ $order->phone }}
                                @if ($order->messenger)
                                    <div class="text-neutral-500 dark:text-neutral-400">{{ $order->messenger }}: {{ $order->contact }}</div>
                                @endif
                            @else
                                {{ $order->email }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($order->isPaperBook())
                                {{ collect([$order->city, $order->country])->filter()->implode(', ') ?: '—' }}
                            @else
                                —
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3">{{ $order->formattedAmount() }}</td>
                        <td class="px-4 py-3">
                            <flux:badge :color="$order->payment_status->color()" size="sm">
                                {{ $order->payment_status->label() }}
                            </flux:badge>
                        </td>
                        <td class="px-4 py-3">
                            {{ $order->email_sent ? 'Да' : 'Нет' }}
                        </td>
                        <td class="px-4 py-3 font-mono text-xs">{{ $order->invoice_id }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="px-4 py-10 text-center text-neutral-500 dark:text-neutral-400">
                            {{ $search || $type || $status ? 'Ничего не найдено' : 'Заказов пока нет' }}
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if ($orders->hasPages())
        <div>
            {{ $orders->links() }}
        </div>
    @endif
</div>
