<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Spaj;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pltp;

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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->where('tgl_submit', '<', Carbon::today()->subDay(6))
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
            if ($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw("YEAR(tgl_submit) as year_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->where('status_approve', 0)
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();


                return DataTables()->of($spaj)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($spaj) {
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($spaj) {
                        return $spaj->year_name;
                    })

                    ->addColumn('count', function ($spaj) {
                        return number_format($spaj->count, 0, ',', '.');
                    })
                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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
            if ($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw("YEAR(tgl_submit) as year_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->where('status_approve', 0)
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('sum_nominal', 'DESC')
                    ->get();

                return DataTables()->of($spaj)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($spaj) {
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($spaj) {
                        return $spaj->year_name;
                    })

                    ->addColumn('sum_nominal', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->sum_nominal, 0, ',', '.') . '';
                    })


                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->where('tgl_submit', '<=', Carbon::today()->subDay(6))
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
                    ->addColumn('tanggal_submit', function ($spaj) {
                        return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($spaj) {
                        return $this->sensor($spaj->tlp);
                    })
                    ->addColumn('nominal_premi', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->nominal_premi, 0, ',', '.') . '';
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
            if ($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw("YEAR(tgl_submit) as year_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->where('status_approve', 1)
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();


                return DataTables()->of($spaj)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($spaj) {
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($spaj) {
                        return $spaj->year_name;
                    })

                    ->addColumn('count', function ($spaj) {
                        return number_format($spaj->count, 0, ',', '.');
                    })
                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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
            if ($request->ajax()) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw("YEAR(tgl_submit) as year_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->where('status_approve', 1)
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('sum_nominal', 'DESC')
                    ->get();

                return DataTables()->of($spaj)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($spaj) {
                        return Carbon::parse($spaj->month_name)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($spaj) {
                        return $spaj->year_name;
                    })

                    ->addColumn('sum_nominal', function ($spaj) {
                        return 'Rp. ' . number_format($spaj->sum_nominal, 0, ',', '.') . '';
                    })


                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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


    // Start Premium Total
    function detailPremiumTotalDaily(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                    ->whereDay('trn_pltp.tgl_update', date('d'))
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->select(
                        'mst_telemarketing.*',
                        'mst_spaj_submit.*',
                        'mst_telemarketing.nama as nama_tele',
                        'trn_pltp.nominal_premi as premi_total',
                        'trn_pltp.*'
                    )
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();

                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('tgl_update', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($pltp) {
                        return $this->sensor($pltp->tlp);
                    })
                    ->addColumn('premi_total', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi_total, 0, ',', '.') . '';
                    })

                    ->rawColumns(['tgl_update', 'tlp', 'premi_total'])
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

    function detailPremiumTotalWeekly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                    ->where('trn_pltp.tgl_update', '<=', Carbon::today()->subDay(6))
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->select(
                        'mst_telemarketing.*',
                        'mst_spaj_submit.*',
                        'mst_telemarketing.nama as nama_tele',
                        'trn_pltp.nominal_premi as premi_total',
                        'trn_pltp.*'
                    )
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();

                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('tgl_update', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($pltp) {
                        return $this->sensor($pltp->tlp);
                    })
                    ->addColumn('premi_total', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi_total, 0, ',', '.') . '';
                    })

                    ->rawColumns(['tgl_update', 'tlp', 'premi_total'])
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

    function detailPremiumTotalMonthly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->select(
                        'mst_telemarketing.*',
                        'mst_spaj_submit.*',
                        'mst_telemarketing.nama as nama_tele',
                        'trn_pltp.nominal_premi as premi_total',
                        'trn_pltp.*'
                    )
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();

                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('tgl_update', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($pltp) {
                        return $this->sensor($pltp->tlp);
                    })
                    ->addColumn('premi_total', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi_total, 0, ',', '.') . '';
                    })

                    ->rawColumns(['tgl_update', 'tlp', 'premi_total'])
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

    function detailPremiumTotalYearly(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->select(
                        'mst_telemarketing.*',
                        'mst_spaj_submit.*',
                        'mst_telemarketing.nama as nama_tele',
                        'trn_pltp.nominal_premi as premi_total',
                        'trn_pltp.*'
                    )
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();

                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('tgl_update', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function ($pltp) {
                        return $this->sensor($pltp->tlp);
                    })
                    ->addColumn('premi_total', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi_total, 0, ',', '.') . '';
                    })

                    ->rawColumns(['tgl_update', 'tlp', 'premi_total'])
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

    function detailPremiumTahun1Chart(Request $request)
    {
        if (Auth::user()->api_token) {
            if ($request->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(
                        'mst_spaj_submit.*',
                        'trn_pltp.*',
                        'trn_pltp.nominal_premi as premi'
                    )
                    ->where('trn_pltp.tahun_ke', 1)
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();


                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('Y');
                    })

                    ->addColumn('sum_nominal', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi, 0, ',', '.') . '';
                    })

                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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

    function detailPremiumPltpChart(Request $request)
    {
        if (Auth::user()->api_token) {
            if ($request->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(
                        'mst_spaj_submit.*',
                        'trn_pltp.*',
                        'trn_pltp.nominal_premi as premi'
                    )
                    ->where('trn_pltp.tahun_ke', '>', 1)
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();


                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('Y');
                    })

                    ->addColumn('sum_nominal', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi, 0, ',', '.') . '';
                    })

                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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

    function detailPremiumTotalChart(Request $request)
    {
        if (Auth::user()->api_token) {
            if ($request->ajax()) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(
                        'mst_spaj_submit.*',
                        'trn_pltp.*',
                        'trn_pltp.nominal_premi as premi'
                    )
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->orderBy('trn_pltp.tgl_update', 'DESC')
                    ->get();

                return DataTables()->of($pltp)
                    ->addIndexColumn()
                    ->addColumn('month_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('MMMM');
                    })
                    // ->addColumn('day_name', function($spaj){
                    //     return Carbon::parse($spaj->day_name)->isoFormat('dddd');
                    // })
                    ->addColumn('year_name', function ($pltp) {
                        return Carbon::parse($pltp->tgl_update)->isoFormat('Y');
                    })

                    ->addColumn('sum_nominal', function ($pltp) {
                        return 'Rp. ' . number_format($pltp->premi, 0, ',', '.') . '';
                    })

                    ->rawColumns(['month_name', 'sum_nominal', 'year_name'])
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

    // End Premium Total
    private function sensor($data = '')
    {
        if ($data == '') {
            return "-";
        } else {
            $sensor = substr($data, 0, 3);
            $censored = 'X';
            for ($i = 0; $i < strlen($data) - 4; $i++) {
                $censored .= "X";
            }
            return $sensor . $censored;
        }
    }
}
