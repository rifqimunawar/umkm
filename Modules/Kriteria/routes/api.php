<?php

use Illuminate\Support\Facades\Route;
use Modules\Kriteria\Http\Controllers\KriteriaController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('kriteria', KriteriaController::class)->names('kriteria');
});
