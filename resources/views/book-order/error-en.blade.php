<x-layouts.main>
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 max-w-2xl mx-auto">
        <div class="text-center mb-6">
            <div class="mx-auto w-16 h-16 bg-red-100 dark:bg-red-900/20 rounded-full flex items-center justify-center mb-4">
                <svg class="w-8 h-8 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">An error occurred</h1>
            <p class="text-gray-600 dark:text-gray-400">{{ $message ?? 'An unexpected error occurred. Please try again later.' }}</p>
        </div>

        <div class="text-center">
            <a href="{{ route_locale('book') }}" 
               class="inline-block px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 font-medium">
                Back to Book
            </a>
        </div>
    </div>
</x-layouts.main>
