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
use App\Models\Bulan;

class AdminDashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(['admin', 'XSS']);
    }

    function index(Request $request)
    {
        if (session()->get('role') == 'admin' && session()->get('api_token')) {
            return view('admin.dashboard');
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
