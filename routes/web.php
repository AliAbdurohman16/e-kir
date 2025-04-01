<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend;
use App\Http\Controllers\Frontend;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes(['verify' => false]);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['middleware' => ['user-access:admin,penguji']], function () {
        Route::get('dashboard', [Backend\DashboardController::class, 'index'])->name('dashboard');
    });
    
    Route::group(['middleware' => ['user-access:user']], function () {
        Route::get('home', [Frontend\HomeController::class, 'index'])->name('home');
        Route::resource('profile', Frontend\ProfileController::class);
        Route::resource('daftar-uji', Frontend\DaftarUjiController::class);
    });
});