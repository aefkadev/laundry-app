<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Client;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminLayananController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminSubLayananController;
use App\Http\Controllers\Admin\AdminTransaksiController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Client\ClientLayananController;
use App\Http\Controllers\Client\ClientOrderController;
use App\Http\Controllers\Client\ClientSubLayananController;
use App\Http\Controllers\UserProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

// CMS SUPER ADMIN
Route::middleware([SuperAdmin::class])->name('super.')->prefix('super')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('layanan', AdminLayananController::class);
    Route::resource('order', AdminOrderController::class);
    Route::resource('sublayanan', AdminSubLayananController::class);
    Route::resource('transaksi', AdminTransaksiController::class);
    Route::resource('user', AdminUserController::class);
    Route::resource('profile', UserProfileController::class);
    Route::get('laporan', [AdminTransaksiController::class, 'indexLaporan']);
    Route::get('chart', [AdminTransaksiController::class, 'indexChart']);
  });

// CMS ADMIN
Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('layanan', AdminLayananController::class);
    Route::resource('order', AdminOrderController::class);
    Route::resource('sublayanan', AdminSubLayananController::class);
    Route::resource('transaksi', AdminTransaksiController::class);
    Route::resource('profile', UserProfileController::class);
    Route::get('laporan', [AdminTransaksiController::class, 'indexLaporan']);
    Route::get('chart', [AdminTransaksiController::class, 'indexChart']);
  });

// MEMBER
Route::middleware([Admin::class])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::resource('profile', UserProfileController::class);
  });

// CLIENT
Route::middleware(['auth'])->group(function () {

    // UTAMA
    Route::get('/', [HomeController::class, 'index']);
    Route::get('/layanan', [ClientLayananController::class, 'index'])->name('layanan');
    Route::get('/order', [ClientOrderController::class, 'index'])->name('order');
    Route::get('/sublayanan', [ClientSubLayananController::class, 'index'])->name('sublayanan');
  
  });
