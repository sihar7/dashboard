<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\BE\AsuransiController;
use App\Http\Controllers\Admin\BE\BulanController;
use App\Http\Controllers\Admin\BE\jenisAsuransiController;

Route::post('postlogin', [AuthController::class, 'postlogin']);
Route::post('logout', [AuthController::class, 'logout']);
Route::get('refreshCaptcha', [AuthController::class, 'refreshCaptcha'])->name('refresh');

Route::get('/login', function () {
    return view('admin.auth.login');
});

Route::group(['middleware' => ['admin', 'XSS']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index']);

    Route::prefix('spaj')->group(function() {
    });

    Route::prefix('tele')->group(function() {
    });

    Route::prefix('account')->group(function() {
    });

    Route::prefix('asuransi')->group(function() {
        Route::get('/', [AsuransiController::class, 'index']);
        Route::get('/edit/{id}', [AsuransiController::class, 'edit']);
        Route::get('/delete/{id}', [AsuransiController::class, 'delete']);
        Route::post('/createOrUpdate', [AsuransiController::class, 'createOrUpdate']);
    });

    Route::prefix('jenisAsuransi')->group(function() {
        Route::get('/', [jenisAsuransiController::class, 'index']);
        Route::get('/edit/{id}', [jenisAsuransiController::class, 'edit']);
        Route::get('/delete/{id}', [jenisAsuransiController::class, 'delete']);
        Route::post('/createOrUpdate', [jenisAsuransiController::class, 'createOrUpdate']);
    });

    Route::prefix('bulan')->group(function() {
        Route::get('/', [BulanController::class, 'index']);
        Route::get('/edit/{id}', [BulanController::class, 'edit']);
        Route::get('/delete/{id}', [BulanController::class, 'delete']);
        Route::post('/createOrUpdate', [BulanController::class, 'createOrUpdate']);
    });




});

