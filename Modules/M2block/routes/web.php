<?php

use Illuminate\Support\Facades\Route;
use Modules\M2block\Http\Controllers\M2blockController;

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


Route::get('/m2block', [M2blockController::class, 'index'])->name('m2block.index');
Route::get('/m2block/create', [M2blockController::class, 'create'])->name('m2block.create');
Route::get('/m2block/export', [M2blockController::class, 'export'])->name('m2block.export');
Route::get('/m2block/pdf', [M2blockController::class, 'pdf'])->name('m2block.pdf');
Route::get('/m2block/print', [M2blockController::class, 'print'])->name('m2block.print');
Route::get('/m2block/{id}', [M2blockController::class, 'edit'])->name('m2block.edit');
Route::get('/m2block/{id}/view', [M2blockController::class, 'view'])->name('m2block.view');
Route::post('/m2block/store', [M2blockController::class, 'store'])->name('m2block.store');
Route::delete('/m2block/{id}/del', [M2blockController::class, 'destroy'])->name('m2block.destroy');
