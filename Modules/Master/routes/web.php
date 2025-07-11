<?php

use Illuminate\Support\Facades\Route;
use Modules\Master\Http\Controllers\JenisPembayaranController;
use Modules\Master\Http\Controllers\KomponenController;
use Modules\Master\Http\Controllers\MasterController;
use Modules\Master\Http\Controllers\SatuanController;
use Modules\Master\Http\Controllers\SupplierController;

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

Route::prefix('master')->middleware('auth')->group(function () {

  Route::get('/satuan', [SatuanController::class, 'index'])->name('master_satuan.index');
  Route::get('/satuan/create', [SatuanController::class, 'create'])->name('master_satuan.create');
  Route::get('/satuan/export', [SatuanController::class, 'export'])->name('master_satuan.export');
  Route::get('/satuan/pdf', [SatuanController::class, 'pdf'])->name('master_satuan.pdf');
  Route::get('/satuan/print', [SatuanController::class, 'print'])->name('master_satuan.print');
  Route::get('/satuan/{id}', [SatuanController::class, 'edit'])->name('master_satuan.edit');
  Route::get('/satuan/{id}/view', [SatuanController::class, 'view'])->name('master_satuan.view');
  Route::post('/satuan/store', [SatuanController::class, 'store'])->name('master_satuan.store');
  Route::delete('/satuan/{id}/del', [SatuanController::class, 'destroy'])->name('master_satuan.destroy');

  Route::get('/supplier', [SupplierController::class, 'index'])->name('master_supplier.index');
  Route::get('/supplier/create', [SupplierController::class, 'create'])->name('master_supplier.create');
  Route::get('/supplier/export', [SupplierController::class, 'export'])->name('master_supplier.export');
  Route::get('/supplier/pdf', [SupplierController::class, 'pdf'])->name('master_supplier.pdf');
  Route::get('/supplier/print', [SupplierController::class, 'print'])->name('master_supplier.print');
  Route::get('/supplier/{id}', [SupplierController::class, 'edit'])->name('master_supplier.edit');
  Route::get('/supplier/{id}/view', [SupplierController::class, 'view'])->name('master_supplier.view');
  Route::post('/supplier/store', [SupplierController::class, 'store'])->name('master_supplier.store');
  Route::delete('/supplier/{id}/del', [SupplierController::class, 'destroy'])->name('master_supplier.destroy');


  Route::get('/jenis_pembayaran', [JenisPembayaranController::class, 'index'])->name('master_jenis.index');
  Route::get('/jenis_pembayaran/create', [JenisPembayaranController::class, 'create'])->name('master_jenis.create');
  Route::get('/jenis_pembayaran/export', [JenisPembayaranController::class, 'export'])->name('master_jenis.export');
  Route::get('/jenis_pembayaran/pdf', [JenisPembayaranController::class, 'pdf'])->name('master_jenis.pdf');
  Route::get('/jenis_pembayaran/print', [JenisPembayaranController::class, 'print'])->name('master_jenis.print');
  Route::get('/jenis_pembayaran/{id}', [JenisPembayaranController::class, 'edit'])->name('master_jenis.edit');
  Route::get('/jenis_pembayaran/{id}/view', [JenisPembayaranController::class, 'view'])->name('master_jenis.view');
  Route::post('/jenis_pembayaran/store', [JenisPembayaranController::class, 'store'])->name('master_jenis.store');
  Route::delete('/jenis_pembayaran/{id}/del', [JenisPembayaranController::class, 'destroy'])->name('master_jenis.destroy');

  Route::get('/komponen', [KomponenController::class, 'index'])->name('master_komponen.index');
  Route::get('/komponen/create', [KomponenController::class, 'create'])->name('master_komponen.create');
  Route::get('/komponen/export', [KomponenController::class, 'export'])->name('master_komponen.export');
  Route::get('/komponen/pdf', [KomponenController::class, 'pdf'])->name('master_komponen.pdf');
  Route::get('/komponen/print', [KomponenController::class, 'print'])->name('master_komponen.print');
  Route::get('/komponen/{id}', [KomponenController::class, 'edit'])->name('master_komponen.edit');
  Route::get('/komponen/{id}/view', [KomponenController::class, 'view'])->name('master_komponen.view');
  Route::post('/komponen/store', [KomponenController::class, 'store'])->name('master_komponen.store');
  Route::delete('/komponen/{id}/del', [KomponenController::class, 'destroy'])->name('master_komponen.destroy');

});

