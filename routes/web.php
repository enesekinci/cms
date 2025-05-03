<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    // Dil Yönetimi
    //    Volt::route('languages', 'languages.index')->name('languages.index');
    //    Volt::route('languages/create', 'languages.create')->name('languages.create');
    //    Volt::route('languages/{language}/edit', 'languages.edit')->name('languages.edit');

    // Route::get('languages', App\Livewire\Languages\Index::class)->name('languages.index');
    Route::prefix('languages')->name('languages.')->group(function () {
        Route::get('/', App\Livewire\Languages\Index::class)->name('index');
        Route::get('/create', App\Livewire\Languages\Create::class)->name('create');
        Route::get('/{language}/edit', App\Livewire\Languages\Edit::class)->name('edit');
    });

    // Dil ve Çeviri Yönetimi
    Volt::route('translations', 'translations.index')->name('translations.index');
});

require __DIR__ . '/auth.php';
