<?php

use Illuminate\Support\Facades\Route;
use Modules\Jabatan\Http\Controllers\JabatanController;

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

Route::prefix('jabatan')->middleware('auth')->group(function () {

  Route::get('/', [JabatanController::class, 'index'])->name('jabatan.index');
  Route::get('/create', [JabatanController::class, 'create'])->name('jabatan.create');
  Route::get('/export', [JabatanController::class, 'export'])->name('jabatan.export');
  Route::get('/pdf', [JabatanController::class, 'pdf'])->name('jabatan.pdf');
  Route::get('/print', [JabatanController::class, 'print'])->name('jabatan.print');
  Route::get('/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
  Route::get('/{id}/view', [JabatanController::class, 'view'])->name('jabatan.view');
  Route::post('/store', [JabatanController::class, 'store'])->name('jabatan.store');
  Route::delete('/{id}/del', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

});
