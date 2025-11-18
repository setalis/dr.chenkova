<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->route('locale', 'ru'); // По умолчанию русский
        
        // Валидация локали
        if (!in_array($locale, ['ru', 'uk'])) {
            $locale = 'ru'; // Fallback на русский
        }
        
        // Логируем для отладки
        \Log::debug('SetLocale middleware', [
            'route_locale' => $request->route('locale'),
            'final_locale' => $locale,
            'url' => $request->url(),
        ]);
        
        // Устанавливаем локаль для приложения
        app()->setLocale($locale);
        
        // Сохраняем в сессию для использования в других местах
        session(['locale' => $locale]);
        
        return $next($request);
    }
}

