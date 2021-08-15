<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dash\DashboardController;
use App\Http\Controllers\BE\SpajSubmittedController;
use App\Http\Controllers\BE\TeleController;
use App\Http\Controllers\Datatable\DetailController;
use App\Http\Controllers\Admin\Auth\AuthController;

Route::post('postlogin', [AuthController::class, 'postlogin'])->middleware('throttle:60,1');
Route::post('logout', [AuthController::class, 'logout']);

Route::get('/login', function () {
    return view('admin.auth.login');
});

Route::group(['middleware' => ['admin', 'XSS']], function () {
    Route::prefix('spaj')->group(function() {
    });
    Route::prefix('tele')->group(function() {
    });

});

