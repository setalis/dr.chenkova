<x-layouts.main>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">გადახდა წარმატებულია!</h1>
            <p class="text-gray-600 dark:text-gray-400">გმადლობთ შეძენისთვის. ინგლისური ელექტრონული წიგნის ფაილები გაიგზავნა თქვენს ელფოსტაზე.</p>
        </div>

        @if(isset($order))
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">შეკვეთის ინფორმაცია:</h2>
                <div class="space-y-3">
                    @if(!empty($order['email']))
                        <div class="flex justify-between">
                            <span class="text-gray-600 dark:text-gray-400">Email:</span>
                            <span class="text-gray-900 dark:text-white font-medium">{{ $order['email'] }}</span>
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">პროდუქტი:</span>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['product_name'] ?? 'ელექტრონული წიგნი (English)' }}</span>
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

        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-md p-4 mb-6">
            <p class="text-sm text-blue-800 dark:text-blue-200">
                <strong>შეამოწმეთ თქვენი ფოსტა!</strong> წიგნის ფაილები EPUB და KPF ფორმატებში გაიგზავნა მითითებულ ელფოსტაზე.
            </p>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route_locale('book') }}"
               class="inline-block px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 font-medium">
                წიგნზე დაბრუნება
            </a>
        </div>
    </div>
</x-layouts.main>
