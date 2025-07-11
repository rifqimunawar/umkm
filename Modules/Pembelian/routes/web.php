<?php

use Illuminate\Support\Facades\Route;
use Modules\Pembelian\Http\Controllers\AssetController;
use Modules\Pembelian\Http\Controllers\PembayaranHutangPembelianController;
use Modules\Penjualan\Http\Controllers\ProdukController;
use Modules\Pembelian\Http\Controllers\PembelianController;
use Modules\Pembelian\Http\Controllers\ReturPembelianController;

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

Route::get('/get_ajx/produk/{kode}', [ProdukController::class, 'get_produk_by_kode']);
Route::get('/get_ajx/bahan', [ProdukController::class, 'get_ajx_bahan']);
Route::post('/post_ajx/bahan_produk', [ProdukController::class, 'post_ajx_bahan_produk']);
Route::get('/get_ajx/bahan_produk/{produk_temp_id}', [ProdukController::class, 'get_ajx_bahan_produk']);
Route::delete('/del_ajx/bahan_produk/{id}', [ProdukController::class, 'del_ajx_bahan_produk']);

Route::get('/get_ajx/komponen', [ProdukController::class, 'get_ajx_komponen']);
Route::post('/post_ajx/komponen_produk', [ProdukController::class, 'post_ajx_komponen_produk']);
Route::get('/get_ajx/komponen_produk/{produk_temp_id}', [ProdukController::class, 'get_ajx_komponen_produk']);
Route::delete('/del_ajx/komponen_produk/{id}', [ProdukController::class, 'del_ajx_komponen_produk']);

Route::prefix('pembelian')->middleware('auth')->group(function () {

  Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
  Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
  Route::get('/produk/export', [ProdukController::class, 'export'])->name('produk.export');
  Route::get('/produk/pdf', [ProdukController::class, 'pdf'])->name('produk.pdf');
  Route::get('/produk/print', [ProdukController::class, 'print'])->name('produk.print');
  Route::get('/produk/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
  Route::get('/produk/{id}/view', [ProdukController::class, 'view'])->name('produk.view');
  Route::post('/produk/store', [ProdukController::class, 'store'])->name('produk.store');
  Route::delete('/produk/{id}/del', [ProdukController::class, 'destroy'])->name('produk.destroy');

  Route::get('/asset', [AssetController::class, 'index'])->name('pembelian_asset.index');
  Route::get('/asset/create', [AssetController::class, 'create'])->name('pembelian_asset.create');
  Route::get('/asset/export', [AssetController::class, 'export'])->name('pembelian_asset.export');
  Route::get('/asset/pdf', [AssetController::class, 'pdf'])->name('pembelian_asset.pdf');
  Route::get('/asset/print', [AssetController::class, 'print'])->name('pembelian_asset.print');
  Route::get('/asset/{id}', [AssetController::class, 'edit'])->name('pembelian_asset.edit');
  Route::get('/asset/{id}/view', [AssetController::class, 'view'])->name('pembelian_asset.view');
  Route::post('/asset/store', [AssetController::class, 'store'])->name('pembelian_asset.store');
  Route::delete('/asset/{id}/del', [AssetController::class, 'destroy'])->name('pembelian_asset.destroy');

  Route::get('/retur', [ReturPembelianController::class, 'index'])->name('pembelian_retur.index');
  Route::get('/getDataPembelian', [ReturPembelianController::class, 'getDataPembelian']);
  Route::get('/retur/create/{id}', [ReturPembelianController::class, 'create'])->name('pembelian_retur.create');
  Route::get('/retur/export', [ReturPembelianController::class, 'export'])->name('pembelian_retur.export');
  Route::get('/retur/pdf', [ReturPembelianController::class, 'pdf'])->name('pembelian_retur.pdf');
  Route::get('/retur/print', [ReturPembelianController::class, 'print'])->name('pembelian_retur.print');
  Route::get('/retur/{id}', [ReturPembelianController::class, 'edit'])->name('pembelian_retur.edit');
  Route::get('/retur/{id}/view', [ReturPembelianController::class, 'view'])->name('pembelian_retur.view');
  Route::post('/retur/store', [ReturPembelianController::class, 'store'])->name('pembelian_retur.store');
  Route::delete('/retur/{id}/del', [ReturPembelianController::class, 'destroy'])->name('pembelian_retur.destroy');

  Route::get('/hutang', [PembayaranHutangPembelianController::class, 'index'])->name('hutang_pembelian.index');
  Route::get('/hutang/create', [PembayaranHutangPembelianController::class, 'create'])->name('hutang_pembelian.create');
  Route::get('/hutang/export', [PembayaranHutangPembelianController::class, 'export'])->name('hutang_pembelian.export');
  Route::get('/hutang/pdf', [PembayaranHutangPembelianController::class, 'pdf'])->name('hutang_pembelian.pdf');
  Route::get('/hutang/print', [PembayaranHutangPembelianController::class, 'print'])->name('hutang_pembelian.print');
  Route::post('/hutang/store', [PembayaranHutangPembelianController::class, 'store'])->name('hutang_pembelian.store');
  Route::delete('/hutang/{id}/del', [PembayaranHutangPembelianController::class, 'destroy'])->name('hutang_pembelian.destroy');
  Route::get('/hutang/{id}/view', [PembayaranHutangPembelianController::class, 'view'])->name('hutang_pembelian.view');
  Route::get('/hutang/{id_barang}', [PembayaranHutangPembelianController::class, 'edit'])->name('hutang_pembelian.edit');

});
