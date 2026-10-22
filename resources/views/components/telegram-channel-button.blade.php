@props(['price', 'color' => 'green'])

@php
    $amount = '$'.number_format((float) $price, 0, ',', ' ');

    $label = match (app()->getLocale()) {
        'uk' => "Замовити книгу за {$amount}",
        'en' => "Order the book for {$amount}",
        'ka' => "შეუკვეთე წიგნი {$amount}",
        default => "Заказать книгу за {$amount}",
    };

    $colorClass = match ($color) {
        'blue' => 'bg-[#214992] hover:bg-[#214992]/80',
        default => 'bg-teal-600 hover:bg-teal-700',
    };
@endphp

<a href="https://t.me/Alina_Chenkova" target="_blank" class="mt-auto block w-full {{ $colorClass }} text-white px-8 py-4 rounded-full transition-all text-lg text-center">
    {{ $label }}
</a>
