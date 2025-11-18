<?php
/**
 * Тестовые роуты для диагностики
 * Подключите этот файл в routes/web.php временно:
 * require __DIR__.'/test-routes.php';
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookOrderController;

// Тест 1: Простейший роут без контроллера
Route::get('/test-simple', function () {
    return 'TEST 1: Простейший роут работает!';
})->name('test.simple');

// Тест 2: Роут с простым view
Route::get('/test-view', function () {
    return view('test-simple');
})->name('test.view');

// Тест 3: Роут с контроллером, но простым ответом
Route::get('/test-controller-simple', function () {
    $controller = new BookOrderController();
    return response('TEST 3: Контроллер создан успешно!', 200);
})->name('test.controller.simple');

// Тест 4: Роут с методом контроллера (упрощенным)
Route::get('/test-controller-create', [BookOrderController::class, 'create'])->name('test.controller.create');

