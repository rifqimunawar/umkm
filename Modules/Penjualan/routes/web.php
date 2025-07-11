<?php

use Illuminate\Support\Facades\Route;
use Modules\Penjualan\Http\Controllers\EditPenjualanController;
use Modules\Penjualan\Http\Controllers\PenjualanController;
use Modules\Penjualan\Http\Controllers\PiutangKonsumenController;

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

Route::prefix('penjualan')->middleware('auth')->group(function () {

  Route::get('/piutang', [PiutangKonsumenController::class, 'index'])->name('penjualan_piutang.index');
  Route::get('/piutang/create', [PiutangKonsumenController::class, 'create'])->name('penjualan_piutang.create');
  Route::get('/piutang/export', [PiutangKonsumenController::class, 'export'])->name('penjualan_piutang.export');
  Route::get('/piutang/pdf', [PiutangKonsumenController::class, 'pdf'])->name('penjualan_piutang.pdf');
  Route::get('/piutang/print', [PiutangKonsumenController::class, 'print'])->name('penjualan_piutang.print');
  Route::get('/piutang/{id}', [PiutangKonsumenController::class, 'edit'])->name('penjualan_piutang.edit');
  Route::get('/piutang/{id}/view', [PiutangKonsumenController::class, 'view'])->name('penjualan_piutang.view');
  Route::post('/piutang/store', [PiutangKonsumenController::class, 'store'])->name('penjualan_piutang.store');
  Route::delete('/piutang/{id}/del', [PiutangKonsumenController::class, 'destroy'])->name('penjualan_piutang.destroy');

  Route::get('/edit', [EditPenjualanController::class, 'index'])->name('penjualan_edit.index');
  Route::get('/ajx_dataTransaksi/{id}', [EditPenjualanController::class, 'getDataTransaksi']);
  Route::get('/ajx_dataKonsumen', [EditPenjualanController::class, 'getDataKonsumen']);
  Route::post('/ajx_storeRetur', [EditPenjualanController::class, 'storeRetur']);
  Route::get('/edit/create', [EditPenjualanController::class, 'create'])->name('penjualan_edit.create');
  Route::get('/edit/export', [EditPenjualanController::class, 'export'])->name('penjualan_edit.export');
  Route::get('/edit/pdf', [EditPenjualanController::class, 'pdf'])->name('penjualan_edit.pdf');
  Route::get('/edit/print', [EditPenjualanController::class, 'print'])->name('penjualan_edit.print');
  Route::get('/edit/{id}', [EditPenjualanController::class, 'edit'])->name('penjualan_edit.edit');
  Route::get('/edit/{id}/view', [EditPenjualanController::class, 'view'])->name('penjualan_edit.view');
  Route::post('/edit/store', [EditPenjualanController::class, 'store'])->name('penjualan_edit.store');
  Route::delete('/edit/{id}/del', [EditPenjualanController::class, 'destroy'])->name('penjualan_edit.destroy');

});
