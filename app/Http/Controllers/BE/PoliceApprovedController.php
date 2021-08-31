<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PoliceApprovedController extends Controller
{

    function __construct()
    {
        $this->middleware(['has_login', 'XSS']);
    }


    function filterHarianPoliceApproved(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->whereDay('tgl_submit', date('d'))
                    ->whereYear('tgl_submit', date('Y'))
                    ->whereIn('status_approve', [1])
                    ->groupBy('day_name')
                    ->orderBy('createdAt')
                    ->get();


                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = $item->day_name;
                    $row['data'][]  = (int)$item->count;
                }
                return response()->json(['data' => $row], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];
                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterMingguPoliceApproved(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(mst_spaj_submit.tgl_submit) as day_name"), DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->where('mst_spaj_submit.tgl_submit', '<=', Carbon::today()->subDay(6))
                    ->whereYear('tgl_submit', date('Y'))
                    ->whereIn('status_approve', [1])
                    ->groupBy('day_name')
                    ->orderBy('createdAt')
                    ->get();

                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = $item->day_name;
                    $row['data'][]  = (int)$item->count;
                }
                return response()->json(['data' => $row], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterBulanPoliceApproved(Request $request)
    {
        // $start = Carbon::parse($request->bulan_awal)->startOfMonth();
        // $end = Carbon::parse($request->bulan_akhir)->startOfMonth();

        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->whereMonth('tgl_submit', $start)
                    ->orWhereMonth('tgl_submit', $end)
                    ->whereYear('tgl_submit', date('Y'))
                    ->whereIn('status_approve', [1])
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();


                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = $item->month_name;
                    $row['data'][]  = (int)$item->count;
                }
                return response()->json(['data' => $row], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterTahunPoliceApproved(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(mst_spaj_submit.tgl_submit) as year_name"), DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->whereYear('tgl_submit', $start)
                    ->orWhereYear('tgl_submit', $end)
                    ->whereIn('status_approve', [1])
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('year_name')
                    ->orderBy('createdAt')
                    ->get();


                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = $item->year_name;
                    $row['data'][]  = (int)$item->count;
                }
                return response()->json(['data' => $row], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterTotalPoliceApproved(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::join('mst_asuransi', 'mst_spaj_submit.asuransi', 'mst_asuransi.id')
                    ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                    ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                    ->where('mst_spaj_submit.status_approve', 0)
                    ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->orderBy('createdAt')
                    ->get();

                $api[] = ['Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [(int)$value->sum_nominal];
                }

                return response()->json(['api' => $api], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }


    function filterHarianTotalPremium(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->whereDay('tgl_submit', date('d'))
                    ->whereIn('status_approve', [1])
                    ->groupBy('day_name')
                    ->orderBy('createdAt')
                    ->get();

                $api[] = ['Hari', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->day_name, $spaj->sum_nominal];
                }
                return response()->json(['data' => $api], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];
                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterMingguTotalPremium(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->where('tgl_submit', '<=', Carbon::today()->subDay(6))
                    ->whereIn('status_approve', [1])
                    ->whereMonth('tgl_submit', date('m'))
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('day_name')
                    ->orderBy('createdAt')
                    ->get();

                $api[] = ['Mingguan', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->day_name, $value->sum_nominal];
                }
                return response()->json(['data' => $api], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterBulanTotalPremium(Request $request)
    {
        // $start = Carbon::parse($request->bulan_awal)->startOfMonth();
        // $end = Carbon::parse($request->bulan_akhir)->startOfMonth();

        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"), DB::raw('max(tgl_submit) as createdAt'))
                    ->whereMonth('tgl_submit', $start)
                    ->orWhereMonth('tgl_submit', $end)
                    ->whereIn('status_approve', [1])
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();

                $api[] = ['Bulan', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->month_name, $value->count];
                }
                return response()->json(['data' => $api], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

    function filterTahunTotalPremium(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(mst_spaj_submit.tgl_submit) as year_name"), DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->whereYear('tgl_submit', $start)
                    ->orWhereYear('tgl_submit', $end)
                    ->whereIn('status_approve', [1])
                    ->groupBy('year_name')
                    ->orderBy('createdAt')
                    ->get();

                $api[] = ['Tahun', ' '];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [(string)$value->year_name, $value->sum_nominal];
                }
                return response()->json(['data' => $api], 201);
            } else {
                $data = [
                    'message' => 'Token Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
            }
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }
}
