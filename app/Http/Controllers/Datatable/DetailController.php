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

    
    

    
    
    function detailPremiumSubmitted(Request $request)
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

    function detailPoliceApproved(Request $request)
    {
        if (Auth::user()->api_token) {
            if (request()->ajax()) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 1)
                ->select(
                    'mst_telemarketing.*',
                    'mst_spaj_submit.*',
                    'mst_telemarketing.nama as nama_tele'
                    )
                ->get();
                return DataTables()->of($spaj)
                ->addIndexColumn()
                    ->addColumn('tanggal_submit', function($spaj){
                           return Carbon::parse($spaj->tgl_submit)->isoFormat('dddd, D MMMM Y');
                    })
                    ->addColumn('tlp', function($spaj){
                           return $this->sensor($spaj->tlp);
                    })

                    ->rawColumns(['tanggal_submit', 'tlp'])
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

    private function sensor($data='')
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
