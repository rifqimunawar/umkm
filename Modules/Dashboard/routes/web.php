<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Modules\Dashboard\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::middleware('auth')->group(function () {
  Route::get('/', fn() => redirect()->route('dashboard'));
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/ajx_get/data_harian_produksi', [DashboardController::class, 'getDataHarianProduksi']);
  Route::get('/ajx_get/data_harian_produk', [DashboardController::class, 'getDataHarianProduk']);

});
