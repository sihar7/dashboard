<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SpajSubmittedController extends Controller
{
    function __construct()
    {
        $this->middleware(['has_login', 'XSS']);
    }

    // Spaj Submitted

    function filterHarianSpajSubmitted(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereDay('tgl_submit', date('d'))
                ->whereIn('status_approve', [0])
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('day_name')
                ->orderBy('createdAt', 'ASC')
                ->get();

                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = Carbon::parse($item->day_name)->isoFormat('dddd');
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

    function filterMingguSpajSubmitted(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(mst_spaj_submit.tgl_submit) as day_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->where('mst_spaj_submit.tgl_submit','<=' , Carbon::today()->subDay(6))
                ->whereIn('status_approve', [0])
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('day_name')
                ->orderBy('createdAt', 'ASC')
                ->get();

                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = Carbon::parse($item->day_name)->isoFormat('dddd');
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

    function filterBulanSpajSubmitted(Request $request)
    {
        // $start = Carbon::parse($request->bulan_awal)->startOfMonth();
        // $end = Carbon::parse($request->bulan_akhir)->startOfMonth();
        DB::beginTransaction();
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereMonth('tgl_submit', $start)
                ->orWhereMonth('tgl_submit', $end)
                ->whereIn('status_approve', [0])
                ->groupBy('month_name')
                ->orderBy('createdAt', 'ASC')
                ->get();


                $row = [];
                foreach ($spaj as $item) {
                    $row['label'][] = Carbon::parse($item->month_name)->isoFormat('MMMM');
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

    function filterTahunSpajSubmitted(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(tgl_submit) as year_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereYear('tgl_submit', $start)
                ->orWhereYear('tgl_submit', $end)
                ->whereIn('status_approve', [0])
                ->groupBy('year_name')
                ->orderBy('createdAt', 'ASC')
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

    function filterTotalSpajSubmitted(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::join('mst_asuransi', 'mst_spaj_submit.asuransi', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 0)
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->sum_nominal];
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

    function filterHarianPremiumSubmitted(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereDay('tgl_submit', date('d'))
                ->whereIn('status_approve', [0])
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Hari', ' '];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), $value->sum_nominal];
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

    function filterMingguPremiumSubmitted(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->where('tgl_submit','<=' , Carbon::today()->subDay(6))
                ->whereIn('status_approve', [0])
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Mingguan', ' '];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), $value->sum_nominal];
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

    function filterBulanPremiumSubmitted(Request $request)
    {
        // $start = Carbon::parse($request->bulan_awal)->startOfMonth();
        // $end = Carbon::parse($request->bulan_akhir)->startOfMonth();

        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(tgl_submit) as month_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereIn('status_approve', [0])
                ->whereMonth('tgl_submit', $start)
                ->orWhereMonth('tgl_submit', $end)
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', ' '];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), $value->sum_nominal];
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

    function filterTahunPremiumSubmitted(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(mst_spaj_submit.tgl_submit) as year_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->whereYear('tgl_submit', $start)
                ->orWhereYear('tgl_submit', $end)
                ->whereIn('status_approve', [0])
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

    function filterTotalPremiumSubmitted(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::join('mst_asuransi', 'mst_spaj_submit.asuransi', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->where('mst_spaj_submit.status_approve', 0)

                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->sum_nominal];
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

}
