<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/home', function() {
    return '
        <h1>Selamat Datang Teman</h1>
            <a href="/baju wanita">Baju Wanita</a>
            <br></br>
            <a href="/baju pria">Baju Pria</a>
            <br></br>
            <a href="/sepatu">Sepatu</a>
            <br></br>
            <a href="/jilbab">Jilbab</a>
    ';
});

Route::get('/baju wanita', function() {
    return 'Ini baju wanita ya';
});

Route::get('/baju pria', function() {
    return 'Ini baju pria';
});

Route::get('/sepatu', function() {
    return 'Ini sepatu';
});

Route::get('/jilbab', function() {
    return 'Ini jilbab';
});

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
});

require __DIR__.'/auth.php';
