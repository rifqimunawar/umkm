<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\SocialiteController;

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

// Route untuk Authentications
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/{id}', [AuthController::class, 'edit'])->name('auth.edit');
Route::put('/auth/{id}', [AuthController::class, 'update'])->name('auth.update');
Route::delete('/auth/{id}/del', [AuthController::class, 'destroy'])->name('auth.destroy');

Route::get('/login-google', [SocialiteController::class, 'redirect'])->name('login.google');
Route::get('/callback', [SocialiteController::class, 'callback'])->name('callback');
