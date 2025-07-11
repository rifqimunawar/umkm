<?php

use Illuminate\Support\Facades\Route;
use Modules\Kasir\Http\Controllers\KasirController;

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


Route::prefix('kasir')->middleware('auth')->group(function () {

  Route::get('/', [KasirController::class, 'index'])->name('kasir.index');
  Route::get('/get_ajx_kategori', [KasirController::class, 'get_ajx_kategori']);
  Route::get('/get_ajx_produk', [KasirController::class, 'get_ajx_produk']);
  Route::get('/get_ajx_produk_by_kategori/{id}', [KasirController::class, 'getProdukByKategori']);
  Route::get('/get_ajx_konsumen', [KasirController::class, 'getDataKonsumen']);
  Route::get('/search_produk', [KasirController::class, 'searchProduk']);
  Route::post('/konsumen/store', [KasirController::class, 'konsumenStore']);
  Route::post('/transaksi/store', [KasirController::class, 'transaksiStore']);
  Route::get('/nota/{id}', [KasirController::class, 'nota'])->name('kasir.nota');

});
