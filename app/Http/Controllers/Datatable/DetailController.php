<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spaj;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class DetailController extends Controller
{
    function detailSpajSubmittedDaily(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->whereYear('tgl_submit', date('Y'))
                ->whereDay('tgl_submit', date('d'))
                ->whereMonth('tgl_submit', date('m'))
                ->where('mst_spaj_submit.status_approve', 0)
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailSpajSubmittedWeekly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 0)
                ->where('tgl_submit', '>', Carbon::today()->subDay(6))
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailSpajSubmittedMonthly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 0)
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailSpajSubmittedYearly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 0)
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    // Spaj Submitted Chart
    function detailSpajSubmittedChart(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw("YEAR(tgl_submit) as year_name"), DB::raw
                ('max(tgl_submit) as createdAt'))
                ->where('status_approve', 0)
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();


                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('month_name', function($spaj){
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function($spaj){
                        return $spaj->year_name;
                    })

                    ->addColumn('count', function($spaj){
                        return number_format($spaj->count, 0, ',', '.');
                    })
                    ->rawColumns(['month_name','sum_nominal', 'year_name'])
                    ->make(true);
            }
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPremiumSubmitted(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw("YEAR(tgl_submit) as year_name"), DB::raw
                ('max(tgl_submit) as createdAt'))
                ->where('status_approve', 0)
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('month_name')
                ->orderBy('sum_nominal', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('month_name', function($spaj){
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function($spaj){
                        return $spaj->year_name;
                    })

                    ->addColumn('sum_nominal', function($spaj){
                        return 'Rp. '.number_format($spaj->sum_nominal, 0, ',', '.').'';
                    })


                    ->rawColumns(['month_name','sum_nominal', 'year_name'])
                    ->make(true);
            }
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }
    // End Spaj SUbmitted Chart


    function detailTotalPremium(Request $request)
    {
        if (Auth::user()->api_token) {
            # code...

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPremiumTahun1(Request $request)
    {
        if (Auth::user()->api_token) {
            # code...

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPltp(Request $request)
    {
    }

    function detailPremiumTotal(Request $request)
    {
    }

    // Police Approved

    function detailPoliceApprovedDaily(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->whereYear('tgl_submit', date('Y'))
                ->whereDay('tgl_submit', date('d'))
                ->whereMonth('tgl_submit', date('m'))
                ->where('mst_spaj_submit.status_approve', 1)
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })
                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPoliceApprovedWeekly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 1)
                ->where('tgl_submit', '>', Carbon::today()->subDay(6))
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPoliceApprovedMonthly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 1)
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailPoliceApprovedYearly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 1)
                ->whereYear('tgl_submit', date('Y'))
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function($spaj){
                        return 'Rp. '.number_format($spaj->nominal_premi, 0, ',', '.').'';
                    })

                    ->rawColumns(['tanggal_submit', 'tlp', 'nominal_premi'])
                    ->make(true);
            }

        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    // Police Approved Chart
    function detailPoliceApprovedChart(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw("YEAR(tgl_submit) as year_name"), DB::raw
                ('max(tgl_submit) as createdAt'))
                ->where('status_approve', 1)
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();


                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('month_name', function($spaj){
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function($spaj){
                        return $spaj->year_name;
                    })

                    ->addColumn('count', function($spaj){
                        return number_format($spaj->count, 0, ',', '.');
                    })
                    ->rawColumns(['month_name','sum_nominal', 'year_name'])
                    ->make(true);
            }
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function detailTotalPremiumChart(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw("YEAR(tgl_submit) as year_name"), DB::raw
                ('max(tgl_submit) as createdAt'))
                ->where('status_approve', 1)
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('month_name')
                ->orderBy('sum_nominal', 'DESC')
                ->get();

                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('month_name', function($spaj){
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function($spaj){
                        return $spaj->year_name;
                    })

                    ->addColumn('sum_nominal', function($spaj){
                        return 'Rp. '.number_format($spaj->sum_nominal, 0, ',', '.').'';
                    })


                    ->rawColumns(['month_name','sum_nominal', 'year_name'])
                    ->make(true);
            }
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }
    // End Police Approved Chart

    private function sensor( $data = '' )
    {
        if ($data == '') {
            return "-";
        } else {
            $sensor = substr($data,0,3);
            $censored = 'X';
            for ($i=0; $i < strlen($data)-4; $i++) {
                $censored .= "X";
            }
            return $sensor.$censored;
        }
    }
}
