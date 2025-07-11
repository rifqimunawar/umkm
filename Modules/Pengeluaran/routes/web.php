<?php

use Illuminate\Support\Facades\Route;
use Modules\Pengeluaran\Http\Controllers\OperasionalController;
use Modules\Pengeluaran\Http\Controllers\PengeluaranLainController;
use Modules\Pengeluaran\Models\PengeluaranLain;

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


Route::prefix('pengeluaran')->middleware('auth')->group(function () {

  Route::get('/operasional', [OperasionalController::class, 'index'])->name('operasional.index');
  Route::get('/operasional/create', [OperasionalController::class, 'create'])->name('operasional.create');
  Route::get('/operasional/export', [OperasionalController::class, 'export'])->name('operasional.export');
  Route::get('/operasional/pdf', [OperasionalController::class, 'pdf'])->name('operasional.pdf');
  Route::get('/operasional/print', [OperasionalController::class, 'print'])->name('operasional.print');
  Route::get('/operasional/{id}', [OperasionalController::class, 'edit'])->name('operasional.edit');
  Route::get('/operasional/{id}/view', [OperasionalController::class, 'view'])->name('operasional.view');
  Route::post('/operasional/store', [OperasionalController::class, 'store'])->name('operasional.store');
  Route::delete('/operasional/{id}/del', [OperasionalController::class, 'destroy'])->name('operasional.destroy');

  Route::get('/lain', [PengeluaranLainController::class, 'index'])->name('pengeluaran_lain.index');
  Route::get('/lain/create', [PengeluaranLainController::class, 'create'])->name('pengeluaran_lain.create');
  Route::get('/lain/export', [PengeluaranLainController::class, 'export'])->name('pengeluaran_lain.export');
  Route::get('/lain/pdf', [PengeluaranLainController::class, 'pdf'])->name('pengeluaran_lain.pdf');
  Route::get('/lain/print', [PengeluaranLainController::class, 'print'])->name('pengeluaran_lain.print');
  Route::get('/lain/{id}', [PengeluaranLainController::class, 'edit'])->name('pengeluaran_lain.edit');
  Route::get('/lain/{id}/view', [PengeluaranLainController::class, 'view'])->name('pengeluaran_lain.view');
  Route::post('/lain/store', [PengeluaranLainController::class, 'store'])->name('pengeluaran_lain.store');
  Route::delete('/lain/{id}/del', [PengeluaranLainController::class, 'destroy'])->name('pengeluaran_lain.destroy');


});
