<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dash\DashboardController;
use App\Http\Controllers\BE\SpajSubmittedController;
use App\Http\Controllers\BE\TeleController;



Route::post('postLogin', [LoginController::class, 'postLogin'])->middleware('throttle:60,1');
Route::post('logout', [LoginController::class, 'logout']);
Route::get('loginPartner', [LoginController::class, 'loginPartner']);
Route::get('loginManagement', [LoginController::class, 'loginManagement']);

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['has_login', 'XSS']], function () {
    Route::prefix('management')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::prefix('spaj')->group(function() {
            Route::post('/filterHarianSpajSubmitted', [SpajSubmittedController::class, 'filterHarianSpajSubmitted']);
            Route::get('/filterMingguSpajSubmitted', [SpajSubmittedController::class, 'filterMingguSpajSubmitted']);
            Route::post('/filterBulanSpajSubmitted', [SpajSubmittedController::class, 'filterBulanSpajSubmitted']);
            Route::post('/filterTahunSpajSubmitted', [SpajSubmittedController::class, 'filterTahunSpajSubmitted']);
            Route::get('/filterTotalSpajSubmitted', [SpajSubmittedController::class, 'filterTotalSpajSubmitted']);
        });
        Route::prefix('tele')->group(function() {
            Route::get('/filterTopTsrAll', [TeleController::class, 'filterTopTsrAll']);
            Route::get('/filterTopTsrWeekly', [TeleController::class, 'filterTopTsrWeekly']);
            Route::post('/filterTopTsrMonthly', [TeleController::class, 'filterTopTsrMonthly']);
            Route::post('/filterTopTsrYearly', [TeleController::class, 'filterTopTsrYearly']);
        });

    });

    Route::prefix('partner')->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

});

