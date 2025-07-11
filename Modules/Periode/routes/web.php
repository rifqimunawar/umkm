<?php

use Illuminate\Support\Facades\Route;
use Modules\Periode\Http\Controllers\PeriodeController;

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

Route::prefix('periode')->middleware('auth')->group(function () {

  Route::get('/', [PeriodeController::class, 'index'])->name('periode.index');
  Route::get('/create', [PeriodeController::class, 'create'])->name('periode.create');
  Route::get('/export', [PeriodeController::class, 'export'])->name('periode.export');
  Route::get('/pdf', [PeriodeController::class, 'pdf'])->name('periode.pdf');
  Route::get('/print', [PeriodeController::class, 'print'])->name('periode.print');
  Route::get('/{id}', [PeriodeController::class, 'edit'])->name('periode.edit');
  Route::get('/{id}/view', [PeriodeController::class, 'view'])->name('periode.view');
  Route::post('/store', [PeriodeController::class, 'store'])->name('periode.store');
  Route::delete('/{id}/del', [PeriodeController::class, 'destroy'])->name('periode.destroy');

});
