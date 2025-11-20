@php
    $currentLocale = app()->getLocale();
    $availableLocales = ['ru' => 'Рус', 'uk' => 'Укр', 'ka' => 'ქარ'];
    
    // Получаем текущий роут и параметры
    try {
        $currentRoute = Route::currentRouteName();
        $currentParams = Route::current()->parameters();
        unset($currentParams['locale']); // Убираем locale из параметров
    } catch (\Exception $e) {
        // Если роут не найден, используем fallback
        $currentRoute = 'home';
        $currentParams = [];
    }
    
    $currentLabel = $availableLocales[$currentLocale] ?? 'Рус';
@endphp

<!-- Горизонтальные кнопки для всех версий -->
<div class="flex items-center space-x-1">
    @foreach($availableLocales as $locale => $label)
        @if($locale === $currentLocale)
            <span class="px-2 py-1 bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-white rounded text-xs font-medium drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] uppercase">
                {{ $label }}
            </span>
        @else
            <a href="{{ route_locale($currentRoute, $currentParams, $locale) }}" 
               class="px-2 py-1 text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white rounded text-xs hover:bg-gray-100 dark:hover:bg-gray-800 transition-all drop-shadow-[0_0_15px_rgba(255,255,255,0.9)] uppercase">
                {{ $label }}
            </a>
        @endif
    @endforeach
</div>

