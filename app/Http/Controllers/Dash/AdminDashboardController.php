<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{

    function __construct()
    {
        $this->middleware(['admin', 'XSS']);
    }

    function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            if (Auth()->user()->api_token) {

                $data['teleCount'] = DB::table('mst_telemarketing')
                ->whereAktif('1')
                ->count();

                $data['asuransiCount'] = DB::table('mst_asuransi')
                ->count();

                $data['spajCount'] = DB::table('mst_spaj_submit')
                ->count();

                $data['premiumCount'] = DB::table('trn_pltp')->count();

                return view('admin.dashboard', $data);
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
