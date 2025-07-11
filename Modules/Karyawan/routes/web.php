<?php

use Illuminate\Support\Facades\Route;
use Modules\Karyawan\Http\Controllers\KaryawanController;

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

Route::prefix('karyawan')->middleware('auth')->group(function () {

  Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
  Route::get('/create', [KaryawanController::class, 'create'])->name('karyawan.create');
  Route::get('/export', [KaryawanController::class, 'export'])->name('karyawan.export');
  Route::get('/pdf', [KaryawanController::class, 'pdf'])->name('karyawan.pdf');
  Route::get('/print', [KaryawanController::class, 'print'])->name('karyawan.print');
  Route::get('/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
  Route::get('/{id}/view', [KaryawanController::class, 'view'])->name('karyawan.view');
  Route::post('/store', [KaryawanController::class, 'store'])->name('karyawan.store');
  Route::delete('/{id}/del', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

});
