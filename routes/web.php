<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HutangpiutangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SettingwebController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin/akun', AkunController::class);
    Route::resource('admin/kategori', KategoriController::class);
    Route::resource('admin/transaksi', TransaksiController::class);
    Route::resource('admin/hutangpiutang', HutangpiutangController::class);
    Route::get('admin/settingweb', [SettingwebController::class, 'index'])->name('settingweb.index');
    Route::post('admin/settingweb', [SettingwebController::class, 'update'])->name('settingweb.update');
});

require __DIR__ . '/auth.php';
