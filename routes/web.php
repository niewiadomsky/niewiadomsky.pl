<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', HomeController::class)->name('home');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('project.show');

// Language switching routes
Route::post('/language/switch', [LanguageController::class, 'switch'])->name('language.switch');
Route::get('/language/available', [LanguageController::class, 'getAvailableLanguages'])->name('language.available');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
