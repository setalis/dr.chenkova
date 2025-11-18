<x-layouts.main>
    

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">Оплата успешна!</h1>
            <p class="text-gray-600 dark:text-gray-400">Спасибо за покупку. Теперь вы можете скачать электронную книгу.</p>
        </div>

        @if(isset($order))
            <div class="border-t border-gray-200 dark:border-gray-700 pt-6 mb-6">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Информация о заказе:</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Товар:</span>
                        <span class="text-gray-900 dark:text-white font-medium">{{ $order['product_name'] }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600 dark:text-gray-400">Сумма:</span>
                        <span class="text-gray-900 dark:text-white font-medium">
                            @if(isset($order['currency_info']['symbol']))
                                {{ number_format($order['amount'] / 100, 2) }} {{ $order['currency_info']['symbol'] }} ({{ $order['currency'] }})
                            @else
                                {{ number_format($order['amount'] / 100, 2) }} ₴
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        @endif

        <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Скачать электронную книгу:</h2>
            
            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4 mb-4">
                <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                    Выберите формат для скачивания. Файлы будут доступны для скачивания сразу после оплаты.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('ebook-order.download') }}" 
                       class="bg-teal-600 text-white px-8 py-4 rounded-full hover:bg-teal-700 transition-all text-lg flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Скачать EPUB
                    </a>
                    
                    <a href="{{ route('ebook-order.download-pdf') }}" 
                       class="bg-[#214992] text-white px-8 py-4 rounded-full hover:bg-[#214992]/80 transition-all text-lg flex items-center justify-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Скачать PDF
                    </a>
                    <a href="{{ asset('files/Kozha_na_vsiu_zhizn_Sovriemie_Alina_Valientinovna_Chienkova_1.pdf') }}" download>
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Скачать PDF
                    </a>
                </div>
            </div>

            <div class="text-sm text-gray-500 dark:text-gray-400">
                <p class="mb-2">После скачивания файл будет доступен в папке "Загрузки" вашего устройства.</p>
                <p>Если у вас возникли проблемы со скачиванием, пожалуйста, свяжитесь с поддержкой.</p>
            </div>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('book') }}" 
               class="inline-block px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 font-medium">
                Вернуться на главную
            </a>
        </div>
    </div></x-layouts.main>

