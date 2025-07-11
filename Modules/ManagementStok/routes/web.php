<?php

use Illuminate\Support\Facades\Route;
use Modules\ManagementStok\Http\Controllers\KategoriController;
use Modules\ManagementStok\Http\Controllers\ManagementStokController;
use Modules\ManagementStok\Http\Controllers\ProdukController;

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

Route::group([], function () {
  Route::resource('managementstok', ManagementStokController::class)->names('managementstok');
});
Route::prefix('stok')->middleware('auth')->group(function () {

  Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
  Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
  Route::get('/kategori/export', [KategoriController::class, 'export'])->name('kategori.export');
  Route::get('/kategori/pdf', [KategoriController::class, 'pdf'])->name('kategori.pdf');
  Route::get('/kategori/print', [KategoriController::class, 'print'])->name('kategori.print');
  Route::get('/kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
  Route::get('/kategori/{id}/view', [KategoriController::class, 'view'])->name('kategori.view');
  Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
  Route::delete('/kategori/{id}/del', [KategoriController::class, 'destroy'])->name('kategori.destroy');

});




