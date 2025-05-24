<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\TestWizard;
use App\Livewire\TestResult;
use App\Http\Controllers\TestResultController;
use App\Http\Controllers\ContactFormController;


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/acne', function () {
    return view('acne');
})->name('acne');

Route::get('/webinar', function () {
    return view('webinar');
})->name('webinar');

Route::get('/lessons', function () {
    return view('lessons');
})->name('lessons');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('test', TestWizard::class)->name('test');
Route::get('result/{session}', TestResult::class)->name('test.result');
Route::get('pdf/{session}', [TestResultController::class, 'downloadPdf'])->name('pdf.download');

Route::get('/test/results/{session}', function (App\Models\TestSession $session) {
    return view('test-results', ['session' => $session]);
})->name('test.results');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::post('/send-contact-form', [ContactFormController::class, 'send'])->name('contact.send');

require __DIR__.'/auth.php';
