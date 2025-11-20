<?php

if (!function_exists('view_locale')) {
    /**
     * Возвращает локализованный view или fallback на оригинальный
     *
     * @param string $view Имя view (без расширения)
     * @param array $data Данные для передачи в view
     * @return \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory
     */
    function view_locale(string $view, array $data = [])
    {
        $locale = app()->getLocale();
        $localizedView = $view . '-' . $locale;
        
        // Логируем для отладки (можно убрать после проверки)
        \Log::debug('view_locale called', [
            'view' => $view,
            'locale' => $locale,
            'localizedView' => $localizedView,
            'exists' => view()->exists($localizedView),
        ]);
        
        // Проверяем существование локализованного view
        if (view()->exists($localizedView)) {
            return view($localizedView, $data);
        }
        
        // Fallback на оригинальный view
        \Log::debug('view_locale fallback to original', ['view' => $view]);
        return view($view, $data);
    }
}

if (!function_exists('route_locale')) {
    /**
     * Генерирует URL для именованного роута с учетом локали
     *
     * @param string $name Имя роута
     * @param array $parameters Параметры роута
     * @param string|null $locale Локаль (если null, используется текущая)
     * @param bool $absolute Абсолютный URL
     * @return string
     */
    function route_locale(string $name, array $parameters = [], ?string $locale = null, bool $absolute = true)
    {
        // Определяем локаль: из параметра, из приложения или fallback на 'ru'
        $locale = $locale ?? app()->getLocale() ?? 'ru';
        
        // Если локаль не валидна, используем 'ru'
        if (!in_array($locale, ['ru', 'uk', 'ka'])) {
            $locale = 'ru';
        }
        
        // Если роут требует locale, добавляем его
        try {
            $parameters = array_merge(['locale' => $locale], $parameters);
            return route($name, $parameters, $absolute);
        } catch (\Exception $e) {
            // Если роут не найден, возвращаем URL с locale вручную
            $url = '/' . $locale . '/' . str_replace('.', '/', $name);
            return $absolute ? url($url) : $url;
        }
    }
}

