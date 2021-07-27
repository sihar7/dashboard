<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dash\DashboardController;
use App\Http\Controllers\BE\SpajSubmittedController;


Route::post('postLogin', [LoginController::class, 'postLogin'])->middleware('throttle:60,1');
Route::post('logout', [LoginController::class, 'logout']);
Route::get('loginPartner', [LoginController::class, 'loginPartner']);
Route::get('loginManagement', [LoginController::class, 'loginManagement']);

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['has_login', 'SecureHeaders', 'XSS']], function () {
    Route::prefix('management')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/filterMingguSpajSubmitted', [SpajSubmittedController::class, 'filterMingguSpajSubmitted']);
        Route::post('/filterBulanSpajSubmitted', [SpajSubmittedController::class, 'filterBulanSpajSubmitted']);
        Route::post('/filterTahunSpajSubmitted', [SpajSubmittedController::class, 'filterTahunSpajSubmitted']);

    });

    Route::prefix('partner')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

});

