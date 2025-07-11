<?php

use Illuminate\Support\Facades\Route;
use Modules\Penilaian\Http\Controllers\PenilaianController;

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

Route::prefix('penilaian')->middleware('auth')->group(function () {

  Route::get('/', [PenilaianController::class, 'index'])->name('penilaian.index');
  Route::get('/create/{id}/{periode_id}', [PenilaianController::class, 'create'])->name('penilaian.create');
  Route::get('/export', [PenilaianController::class, 'export'])->name('penilaian.export');
  Route::get('/pdf', [PenilaianController::class, 'pdf'])->name('penilaian.pdf');
  Route::get('/print', [PenilaianController::class, 'print'])->name('penilaian.print');
  Route::get('/{id}', [PenilaianController::class, 'edit'])->name('penilaian.edit');
  Route::get('/{id}/view', [PenilaianController::class, 'view'])->name('penilaian.view');
  Route::post('/store', [PenilaianController::class, 'store'])->name('penilaian.store');
  Route::delete('/{id}/del', [PenilaianController::class, 'destroy'])->name('penilaian.destroy');

});
