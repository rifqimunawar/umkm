<?php

use Illuminate\Support\Facades\Route;
use Modules\Pemasukan\Http\Controllers\PemasukanController;

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


Route::prefix('pemasukan')->middleware('auth')->group(function () {

  Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');
  Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');
  Route::get('/pemasukan/export', [PemasukanController::class, 'export'])->name('pemasukan.export');
  Route::get('/pemasukan/pdf', [PemasukanController::class, 'pdf'])->name('pemasukan.pdf');
  Route::get('/pemasukan/print', [PemasukanController::class, 'print'])->name('pemasukan.print');
  Route::get('/pemasukan/{id}', [PemasukanController::class, 'edit'])->name('pemasukan.edit');
  Route::get('/pemasukan/{id}/view', [PemasukanController::class, 'view'])->name('pemasukan.view');
  Route::post('/pemasukan/store', [PemasukanController::class, 'store'])->name('pemasukan.store');
  Route::delete('/pemasukan/{id}/del', [PemasukanController::class, 'destroy'])->name('pemasukan.destroy');

});

