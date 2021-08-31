<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dash\DashboardController;
use App\Http\Controllers\BE\SpajSubmittedController;
use App\Http\Controllers\BE\TeleController;
use App\Http\Controllers\BE\PoliceApprovedController;
use App\Http\Controllers\BE\PremiumTotalController;
use App\Http\Controllers\Datatable\DetailController;
use App\Http\Controllers\Export\SpajController;
use App\Http\Controllers\Export\PoliceApprovedExController;
use App\Http\Controllers\Export\PremiumExportController;


// Route::get('pdf/preview', [DashboardController::class, 'indexPdf']);
// Route::get('pdf/generate', [DashboardController::class, 'createPdf']);

Route::post('postlogin', [LoginController::class, 'postlogin'])->middleware('throttle:60,1');
Route::post('logout', [LoginController::class, 'logout']);
Route::get('loginpartner', [LoginController::class, 'loginpartner']);
Route::get('loginmanagement', [LoginController::class, 'loginmanagement']);
Route::get('logintele', [LoginController::class, 'logintele']);
Route::get('loginreport', [LoginController::class, 'loginreport']);

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['has_login', 'XSS']], function () {
    Route::prefix('management')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::prefix('spaj')->group(function () {
            Route::post('/filterHarianSpajSubmitted', [SpajSubmittedController::class, 'filterHarianSpajSubmitted']);
            Route::post('/filterMingguSpajSubmitted', [SpajSubmittedController::class, 'filterMingguSpajSubmitted']);
            Route::post('/filterBulanSpajSubmitted', [SpajSubmittedController::class, 'filterBulanSpajSubmitted']);
            Route::post('/filterTahunSpajSubmitted', [SpajSubmittedController::class, 'filterTahunSpajSubmitted']);
            Route::get('/filterTotalSpajSubmitted', [SpajSubmittedController::class, 'filterTotalSpajSubmitted']);

            Route::post('/filterHarianPremiumSubmitted', [SpajSubmittedController::class, 'filterHarianPremiumSubmitted']);
            Route::post('/filterMingguPremiumSubmitted', [SpajSubmittedController::class, 'filterMingguPremiumSubmitted']);
            Route::post('/filterBulanPremiumSubmitted', [SpajSubmittedController::class, 'filterBulanPremiumSubmitted']);
            Route::post('/filterTahunPremiumSubmitted', [SpajSubmittedController::class, 'filterTahunPremiumSubmitted']);
            Route::get('/filterTotalPremiumSubmitted', [SpajSubmittedController::class, 'filterTotalPremiumSubmitted']);

            // Spaj Submitted
            Route::get('/detailSpajSubmittedDaily', [DetailController::class, 'detailSpajSubmittedDaily'])->name('detailSpajSubmittedDaily');
            Route::get('/detailSpajSubmittedWeekly', [DetailController::class, 'detailSpajSubmittedWeekly']);
            Route::get('/detailSpajSubmittedMonthly', [DetailController::class, 'detailSpajSubmittedMonthly']);
            Route::get('/detailSpajSubmittedYearly', [DetailController::class, 'detailSpajSubmittedYearly']);

            //Detail Submitted Chart
            Route::get('/detailPremiumSubmitted', [DetailController::class, 'detailPremiumSubmitted']);
            Route::get('/detailSpajSubmittedChart', [DetailController::class, 'detailSpajSubmittedChart']);
            // End Detail

            // Police Approved
            Route::get('/detailPoliceApprovedDaily', [DetailController::class, 'detailPoliceApprovedDaily']);
            Route::get('/detailPoliceApprovedWeekly', [DetailController::class, 'detailPoliceApprovedWeekly']);
            Route::get('/detailPoliceApprovedMonthly', [DetailController::class, 'detailPoliceApprovedMonthly']);
            Route::get('/detailPoliceApprovedYearly', [DetailController::class, 'detailPoliceApprovedYearly']);

            // Start Police Approved Chart
            Route::get('/detailPoliceApprovedChart', [DetailController::class, 'detailPoliceApprovedChart']);
            Route::get('/detailTotalPremiumChart', [DetailController::class, 'detailTotalPremiumChart']);
            // End Police Approved Chart

            // Start Detail PremiumTotal
            Route::get('/detailPremiumTotalDaily', [DetailController::class, 'detailPremiumTotalDaily'])->name('detailSpajSubmittedDaily');
            Route::get('/detailPremiumTotalWeekly', [DetailController::class, 'detailPremiumTotalWeekly']);
            Route::get('/detailPremiumTotalMonthly', [DetailController::class, 'detailPremiumTotalMonthly']);
            Route::get('/detailPremiumTotalYearly', [DetailController::class, 'detailPremiumTotalYearly']);

            Route::get('/detailPremiumTahun1Chart', [DetailController::class, 'detailPremiumTahun1Chart'])->name('detailSpajSubmittedDaily');
            Route::get('/detailPremiumPltpChart', [DetailController::class, 'detailPremiumPltpChart'])->name('detailSpajSubmittedDaily');
            Route::get('/detailPremiumTotalChart', [DetailController::class, 'detailPremiumTotalChart'])->name('detailSpajSubmittedDaily');

            // End PremiumTotal
        });
        Route::prefix('tele')->group(function () {
            Route::post('/filterHarianTopTsr', [TeleController::class, 'filterHarianTopTsr']);
            Route::get('/filterMingguTopTsr', [TeleController::class, 'filterMingguTopTsr']);
            Route::post('/filterBulanTopTsr', [TeleController::class, 'filterBulanTopTsr']);
            Route::post('/filterTahunTopTsr', [TeleController::class, 'filterTahunTopTsr']);
            Route::get('/filterTotalTopTsr', [TeleController::class, 'filterTotalTopTsr']);
        });
        Route::prefix('policeApproved')->group(function () {
            Route::post('/filterHarianPoliceApproved', [PoliceApprovedController::class, 'filterHarianPoliceApproved']);
            Route::post('/filterMingguPoliceApproved', [PoliceApprovedController::class, 'filterMingguPoliceApproved']);
            Route::post('/filterBulanPoliceApproved', [PoliceApprovedController::class, 'filterBulanPoliceApproved']);
            Route::post('/filterTahunPoliceApproved', [PoliceApprovedController::class, 'filterTahunPoliceApproved']);
            Route::get('/filterTotalPoliceApproved', [PoliceApprovedController::class, 'filterTotalPoliceApproved']);


            Route::post('/filterHarianTotalPremium', [PoliceApprovedController::class, 'filterHarianTotalPremium']);
            Route::post('/filterMingguTotalPremium', [PoliceApprovedController::class, 'filterMingguTotalPremium']);
            Route::post('/filterBulanTotalPremium', [PoliceApprovedController::class, 'filterBulanTotalPremium']);
            Route::post('/filterTahunTotalPremium', [PoliceApprovedController::class, 'filterTahunTotalPremium']);
            Route::get('/filterTotalTotalPremium', [PoliceApprovedController::class, 'filterTotalTotalPremium']);
        });
        Route::prefix('premiumTotal')->group(function () {
            Route::post('/filterHarianPremiumTahun1', [PremiumTotalController::class, 'filterHarianPremiumTahun1']);
            Route::post('/filterMingguPremiumTahun1', [PremiumTotalController::class, 'filterMingguPremiumTahun1']);
            Route::post('/filterBulanPremiumTahun1', [PremiumTotalController::class, 'filterBulanPremiumTahun1']);
            Route::post('/filterTahunPremiumTahun1', [PremiumTotalController::class, 'filterTahunPremiumTahun1']);


            Route::post('/filterHarianPltp', [PremiumTotalController::class, 'filterHarianPltp']);
            Route::post('/filterMingguPltp', [PremiumTotalController::class, 'filterMingguPltp']);
            Route::post('/filterBulanPltp', [PremiumTotalController::class, 'filterBulanPltp']);
            Route::post('/filterTahunPltp', [PremiumTotalController::class, 'filterTahunPltp']);

            Route::post('/filterHarianPremiumTotal', [PremiumTotalController::class, 'filterHarianPremiumTotal']);
            Route::post('/filterMingguPremiumTotal', [PremiumTotalController::class, 'filterMingguPremiumTotal']);
            Route::post('/filterBulanPremiumTotal', [PremiumTotalController::class, 'filterBulanPremiumTotal']);
            Route::post('/filterTahunPremiumTotal', [PremiumTotalController::class, 'filterTahunPremiumTotal']);
        });
    });

    Route::prefix('partner')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
    });

    Route::prefix('report')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index']);
        Route::get('/spajSubmittedDaily', [SpajController::class, 'exportSpajSubmittedDaily']);
        Route::get('/spajSubmittedWeekly', [SpajController::class, 'exportSpajSubmittedWeekly']);
        Route::get('/spajSubmittedMonthly', [SpajController::class, 'exportSpajSubmittedMonthly']);
        Route::get('/spajSubmittedYearly', [SpajController::class, 'exportSpajSubmittedYearly']);


        Route::get('/policeApprovedDaily', [PoliceApprovedExController::class, 'exportPoliceApprovedDaily']);
        Route::get('/policeApprovedWeekly', [PoliceApprovedExController::class, 'exportPoliceApprovedWeekly']);
        Route::get('/policeApprovedMonthly', [PoliceApprovedExController::class, 'exportPoliceApprovedMonthly']);
        Route::get('/policeApprovedYearly', [PoliceApprovedExController::class, 'exportPoliceApprovedYearly']);


        Route::get('/premiumTotalDaily', [PremiumExportController::class, 'exportPremiumTotalDaily']);
        Route::get('/premiumTotalWeekly', [PremiumExportController::class, 'exportPremiumTotalWeekly']);
        Route::get('/premiumTotalMonthly', [PremiumExportController::class, 'exportPremiumTotalMonthly']);
        Route::get('/premiumTotalYearly', [PremiumExportController::class, 'exportPremiumTotalYearly']);
    });
});
