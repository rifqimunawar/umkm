<?php

use Illuminate\Support\Facades\Route;
use Modules\Kriteria\Http\Controllers\KriteriaController;

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

Route::prefix('kriteria')->middleware('auth')->group(function () {

  Route::get('/', [KriteriaController::class, 'index'])->name('kriteria.index');
  Route::get('/create', [KriteriaController::class, 'create'])->name('kriteria.create');
  Route::get('/export', [KriteriaController::class, 'export'])->name('kriteria.export');
  Route::get('/pdf', [KriteriaController::class, 'pdf'])->name('kriteria.pdf');
  Route::get('/print', [KriteriaController::class, 'print'])->name('kriteria.print');
  Route::get('/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
  Route::get('/{id}/view', [KriteriaController::class, 'view'])->name('kriteria.view');
  Route::post('/store', [KriteriaController::class, 'store'])->name('kriteria.store');
  Route::delete('/{id}/del', [KriteriaController::class, 'destroy'])->name('kriteria.destroy');

});
