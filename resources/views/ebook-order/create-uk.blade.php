<x-layouts.main>
    <div class="mb-6">
        <a href="{{ route_locale('book') }}" class="text-blue-600 hover:text-blue-800 font-medium">
            ← Повернутися
        </a>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Замовлення електронної книги</h1>

        <p class="text-gray-700 dark:text-gray-300 mb-6">
            Ви купуєте електронну версію книги у 4 форматах: EPUB, PDF, MOBI та FB2.
        </p>

        <p class="text-gray-700 dark:text-gray-300 mb-6 font-semibold">
            Після успішної оплати файли книги будуть надіслані на вказану вами email адресу.
        </p>

        <form action="{{ route_locale('ebook-order.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>
                <input type="email" 
                       name="email" 
                       id="email" 
                       value="{{ old('email') }}"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                              bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                              focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('email') border-red-500 @enderror"
                       placeholder="example@email.com"
                       required>
                @error('email')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            @error('payment')
                <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-md">
                    <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                </div>
            @enderror

            <x-privacy-checkbox />

            <div class="flex gap-4">
                <button type="submit" 
                        class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                    Перейти до оплати
                </button>
                <a href="{{ route_locale('book') }}" 
                   class="px-6 py-3 bg-gray-300 dark:bg-gray-600 text-gray-700 dark:text-white rounded-md hover:bg-gray-400 dark:hover:bg-gray-500 font-medium">
                    Скасувати
                </a>
            </div>
        </form>
    </div>
</x-layouts.main>

