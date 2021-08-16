<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use App\Repository\TeleRepo;
use App\Repository\PremiumTotalRepo;
use App\Repository\SpajSubmittedRepo;
use Illuminate\Support\Facades\Auth;
use PDF;

class DashboardController extends Controller
{

    protected $tele;
    protected $spaj;
    protected $premiumTotal;

    function __construct(TeleRepo $tele, SpajSubmittedRepo $spaj, PremiumTotalRepo $premiumTotal)
    {
        $this->spaj = $spaj;
        $this->tele = $tele;
        $this->premiumTotal = $premiumTotal;

        $this->middleware(['has_login', 'XSS']);
    }

    function index(Request $request)
    {
        if($request->user()->hasRole('management'))
        {
            if (Auth()->user()->api_token) {
                // Start Tele
                $data['getHistoryTele']          = $this->tele->getHistoryTele();
                $data['topTsr10']                = $this->tele->topTsr10();
                $data['getTeleReward']           = $this->tele->getTeleReward();
                // End Tele

                // Start Spaj Submitted
                $data['spajSubmitted']           = $this->spaj->spajSubmitted();
                $data['premiumSubmitted']        = $this->spaj->premiumSubmitted();
                $data['spajSubmittedCountDaily'] = $this->spaj->spajSubmittedCountDaily();
                $data['spajSubmittedCountWeekly']= $this->spaj->spajSubmittedCountWeekly();
                $data['spajSubmittedCountMonthly'] = $this->spaj->spajSubmittedCountMonthly();
                $data['spajSubmittedCountYearly'] = $this->spaj->spajSubmittedCountYearly();
                // End Spaj Submitted


                //Start Police Approved
                $data['policeApprovedChart']     = $this->spaj->policeApprovedChart();
                $data['totalPremiumChart']       = $this->spaj->totalPremiumChart();
                $data['policeApprovedCountDaily'] = $this->spaj->policeApprovedCountDaily();
                $data['policeApprovedCountWeekly'] = $this->spaj->policeApprovedCountWeekly();
                $data['policeApprovedCountMonthly'] = $this->spaj->policeApprovedCountMonthly();
                $data['policeApprovedCountYearly'] = $this->spaj->policeApprovedCountYearly();
                // End Police Approved

                // Start Premium Total
                $data['premiumTahun1Chart'] = $this->premiumTotal->premiumTahun1Chart();
                $data['premiumPltpChart'] = $this->premiumTotal->premiumPltpChart();
                $data['premiumTotalChart'] = $this->premiumTotal->premiumTotalChart();

                $data['premiumTotalCountDaily'] = $this->premiumTotal->premiumTotalCountDaily();
                $data['premiumTotalCountWeekly'] = $this->premiumTotal->premiumTotalCountWeekly();
                $data['premiumTotalCountMonthly'] = $this->premiumTotal->premiumTotalCountMonthly();
                $data['premiumTotalCountYearly'] = $this->premiumTotal->premiumTotalCountYearly();

                // End Premium Total
                return view('management.dashboard', $data);
                // return view('management.dashboard');
            } else {
                abort(404);
            }
        }
          else if($request->user()->hasRole('partner'))
        {
            if (Auth()->user()->api_token) {
                return view('partner.dashboard');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

    // function indexPdf()
    // {
    //     return view('pdf.index');
    // }

    // function createPdf()
    // {
    //     $pdf = PDF::loadView('pdf.pdf');

    //     $path = public_path('pdf/');
    //     $fileName =  time().'.'. 'pdf' ;
    //     $pdf->save($path . '/' . $fileName);

    //     $pdf = public_path('pdf/'.$fileName);
    //     set_time_limit(300);
    //     return response()->download($pdf);
    // }

}
