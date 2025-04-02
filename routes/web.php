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
        Route::get('data-uji/belum-validasi', [Backend\UjiController::class, 'index'])->name('data-uji.belum-validasi');
        Route::get('data-uji/{id}/show', [Backend\UjiController::class, 'show'])->name('data-uji.show');
        Route::put('data-uji/validasi/{id}', [Backend\UjiController::class, 'validasi'])->name('data-uji.validasi');
        Route::get('data-uji/sudah-validasi', [Backend\UjiController::class, 'sudahValidasi'])->name('data-uji.sudah-validasi');
        Route::get('data-uji/belum-diuji', [Backend\UjiController::class, 'belumDiuji'])->name('data-uji.belum-diuji');
        Route::put('data-uji/lolos/{id}', [Backend\UjiController::class, 'lolos'])->name('data-uji.lolos');
        Route::put('data-uji/tolak/{id}', [Backend\UjiController::class, 'tolak'])->name('data-uji.tolak');
        Route::get('data-uji/teruji', [Backend\UjiController::class, 'teruji'])->name('data-uji.teruji');
        Route::get('data-uji/tidak-teruji', [Backend\UjiController::class, 'tidakTeruji'])->name('data-uji.tidak-teruji');
        Route::resource('pengguna', Backend\UserController::class);
        Route::get('laporan', [Backend\LaporanController::class, 'index'])->name('laporan');
        Route::get('laporan/data', [Backend\LaporanController::class, 'data'])->name('laporan.data');
        Route::get('profil', [Backend\ProfilController::class, 'index'])->name('profil');
        Route::post('profil/store', [Backend\ProfilController::class, 'store'])->name('profil.store');
        Route::delete('profil/{id}', [Backend\ProfilController::class, 'destroy'])->name('profil.destroy');
        Route::get('ubah-kata-sandi', [Backend\UbahKataSandiController::class, 'index'])->name('ubah-kata-sandi');
        Route::post('ubah-kata-sandi/store', [Backend\UbahKataSandiController::class, 'store'])->name('ubah-kata-sandi.store');
    });
    
    Route::group(['middleware' => ['user-access:user']], function () {
        Route::get('home', [Frontend\HomeController::class, 'index'])->name('home');
        Route::get('history', [Frontend\HistoryController::class, 'index'])->name('history');
        Route::get('history/{id}', [Frontend\HistoryController::class, 'show'])->name('history.show');
        Route::resources([
            'profile' => Frontend\ProfileController::class,
            'daftar-uji' => Frontend\DaftarUjiController::class
        ]);
    });
});