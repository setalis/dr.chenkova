<x-layouts.main>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">შეკვეთა წარმატებით გაიფორმა!</h1>
            <p class="text-gray-600 dark:text-gray-400">გმადლობთ თქვენი შეკვეთისთვის. უახლოეს დროში დავუკავშირდებით.</p>
        </div>

        @if(isset($order))
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">შეკვეთის მონაცემები:</h2>
                <div class="space-y-3">
                    @if(!empty($order['name']))
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">სახელი:</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $order['name'] }}</span>
                        </div>
                    @endif
                    @if(!empty($order['messenger']))
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">მესენჯერი:</span>
                            <span class="text-gray-900 dark:text-white font-medium">
                                @if($order['messenger'] === 'telegram')
                                    Telegram
                                @elseif($order['messenger'] === 'instagram')
                                    Instagram
                                @elseif($order['messenger'] === 'whatsapp')
                                    WhatsApp
                                @endif
                            </span>
                        </div>
                    @endif
                    @if(!empty($order['contact']))
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">კონტაქტი:</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $order['contact'] }}</span>
                        </div>
                    @endif
                    @if(!empty($order['country']) || !empty($order['city']) || !empty($order['address_1']))
                        <div class="space-y-2">
                            <div class="text-gray-600 dark:text-gray-400 font-semibold mb-2">მიწოდების მისამართი:</div>
                            <div class="pl-4 space-y-1">
                                @if(!empty($order['country']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">ქვეყანა:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['country'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['city']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">ქალაქი:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['city'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['region']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">რეგიონი:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['region'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['address_1']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">მისამართი 1:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['address_1'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['address_2']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">მისამართი 2:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['address_2'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['zip']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">ინდექსი (ZIP):</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['zip'] }}</span>
                                    </div>
                                @endif
                                @if(!empty($order['phone']))
                                    <div class="flex justify-between">
                                        <span class="text-gray-600 dark:text-gray-400">ტელეფონის ნომერი:</span>
                                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['phone'] }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">საქონელი:</span>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['product_name'] ?? 'ბეჭდური წიგნი' }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">თანხა:</span>
                        <span class="text-gray-900 dark:text-white font-medium">
                            @if(isset($order['currency_info']['symbol']))
                                {{ number_format($order['amount'] / 100, 2) }} {{ $order['currency_info']['symbol'] }} ({{ $order['currency'] ?? 'UAH' }})
                            @else
                                {{ number_format($order['amount'] / 100, 2) }} ₴
                            @endif
                        </span>
                    </div>
                    @if(!empty($order['invoice_id']))
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">შეკვეთის ნომერი:</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $order['invoice_id'] }}</span>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <div class="mt-6 text-center">
            <a href="{{ route_locale('book') }}" 
               class="inline-block px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                მთავარზე დაბრუნება
            </a>
        </div>
    </div>
</x-layouts.main>

