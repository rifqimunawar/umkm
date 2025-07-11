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

  Route::get('/ajx_get/get_data_all', [DashboardController::class, 'get_data_all']);
  Route::get('/ajx_get/get_data_jenjang/{nama_jenjang}', [DashboardController::class, 'get_data_jenjang']);
  Route::get('/ajx_get/get_data_fakultas/{nama_fakultas}', [DashboardController::class, 'get_data_fakultas']);
  Route::get('/ajx_get/get_data_prodi/{nama_prodi}', [DashboardController::class, 'get_data_prodi']);
  Route::get('/ajx_get/data_bayar_formulir', [DashboardController::class, 'get_data_bayar_formulir']);

});
