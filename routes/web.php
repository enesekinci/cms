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

    Route::prefix('languages')->name('languages.')->group(function () {
        Route::get('/', App\Livewire\Languages\Index::class)->name('index');
        Route::get('/create', App\Livewire\Languages\Create::class)->name('create');
        Route::get('/{language}/edit', App\Livewire\Languages\Edit::class)->name('edit');
    });

    Route::prefix('translations')->name('translations.')->group(function () {
        Route::get('/', \App\Livewire\Translations\Index::class)->name('index');
        Route::get('/create', \App\Livewire\Translations\Create::class)->name('create');
        Route::get('/{id}/edit', \App\Livewire\Translations\Edit::class)->name('edit');
    });

    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', \App\Livewire\Roles\Index::class)->name('index');
        Route::get('/create', \App\Livewire\Roles\Create::class)->name('create');
        Route::get('/{id}/edit', \App\Livewire\Roles\Edit::class)->name('edit');
    });

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', \App\Livewire\Users\Index::class)->name('index');
        Route::get('/create', \App\Livewire\Users\Create::class)->name('create');
        Route::get('/{id}/edit', \App\Livewire\Users\Edit::class)->name('edit');
    });
});

require __DIR__ . '/auth.php';
