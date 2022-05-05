<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/all', [AplikasiController::class, 'all']);

Route::get('/relationship-1', [AplikasiController::class, 'relationship1']);
Route::get('/relationship-2', [AplikasiController::class, 'relationship2']);

Route::get('/relationship-3', [AplikasiController::class, 'relationship3']);

Route::get('/input-1', [AplikasiController::class, 'input1']);
Route::get('/input-2', [AplikasiController::class, 'input2']);

Route::get('/delete', [AplikasiController::class, 'delete']);
