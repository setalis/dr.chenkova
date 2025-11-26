<?php

use App\Http\Controllers\BookOrderController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\TestResultController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\TestResult;
use App\Livewire\TestWizard;
use Illuminate\Support\Facades\Route;

// Редирект с корня на русскую версию по умолчанию
Route::get('/', function () {
    return redirect('/ru');
});

// Группа роутов с локализацией
Route::prefix('{locale}')->where(['locale' => 'ru|uk|ka'])->middleware('locale')->group(function () {

    // Основные страницы
    Route::get('/', function ($locale) {
        return view_locale('home');
    })->name('home');

    Route::get('/acne', function ($locale) {
        return view_locale('acne');
    })->name('acne');

    Route::get('/webinar', function ($locale) {
        return view_locale('webinar');
    })->name('webinar');

    Route::get('/lessons', function ($locale) {
        return view_locale('lessons');
    })->name('lessons');

    Route::get('/guide', function ($locale) {
        return view_locale('guide');
    })->name('guide');

    Route::get('/about', function ($locale) {
        return view_locale('about');
    })->name('about');

    Route::get('/contact', function ($locale) {
        return view_locale('contact');
    })->name('contact');

    Route::get('/legal-info', function ($locale) {
        return view_locale('legal-info');
    })->name('legal-info');

    Route::get('/book', function ($locale) {
        return view_locale('book');
    })->name('book');

    Route::get('/book/excerpt-pdf', function ($locale) {
        return view_locale('excerpt-pdf');
    })->name('book.excerpt-pdf');

    Route::get('/book/excerpt', [BookOrderController::class, 'viewExcerpt'])->name('book.excerpt');

    Route::get('/book/return-policy', function ($locale) {
        return view_locale('return-policy');
    })->name('book.return-policy');

    Route::get('/animate-book', function ($locale) {
        return view_locale('animate-book');
    })->name('animate-book');

    // Заказы бумажных книг
    Route::prefix('book-order')->name('book-order.')->group(function () {
        Route::get('/create', [BookOrderController::class, 'create'])->name('create');
        Route::post('/store', [BookOrderController::class, 'store'])->name('store');
        Route::get('/payment-success', [BookOrderController::class, 'paymentSuccess'])->name('payment-success');
    });

    // Заказы электронных книг
    Route::prefix('ebook-order')->name('ebook-order.')->group(function () {
        Route::get('/create', [BookOrderController::class, 'showEbookForm'])->name('create');
        Route::post('/store', [BookOrderController::class, 'createEbook'])->name('store');
        Route::get('/payment-success', [BookOrderController::class, 'ebookPaymentSuccess'])->name('payment-success');
        Route::get('/download', [BookOrderController::class, 'downloadEbook'])->name('download');
        Route::get('/download-pdf', [BookOrderController::class, 'downloadEbookPdf'])->name('download-pdf');
        Route::get('/download-pdf-file', [BookOrderController::class, 'downloadEbookPdfFile'])->name('download-pdf-file');
    });

    // Тест определения типа кожи
    Route::get('test', TestWizard::class)->name('test');
    Route::get('result/{session}', TestResult::class)->name('test.result');
    Route::get('pdf/{session}', [TestResultController::class, 'downloadPdf'])->name('pdf.download');

    Route::get('/test/results/{session}', function ($locale, App\Models\TestSession $session) {
        return view_locale('test-results', ['session' => $session]);
    })->name('test.results');

    // Контактная форма
    Route::post('/send-contact-form', [ContactFormController::class, 'send'])->name('contact.send');
});

// Webhook маршруты без локализации (вызываются внешними сервисами)
Route::post('/book-order/webhook', [BookOrderController::class, 'webhook'])->name('book-order.webhook');
Route::post('/ebook-order/webhook', [BookOrderController::class, 'ebookWebhook'])->name('ebook-order.webhook');

// Роуты без локализации (для внутренних систем)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
