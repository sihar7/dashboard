<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dash\AdminDashboardController;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::post('postlogin', [AuthController::class, 'postlogin']);
Route::post('logout', [AuthController::class, 'logout']);

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

});

