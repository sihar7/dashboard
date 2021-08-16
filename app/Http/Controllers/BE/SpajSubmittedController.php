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

    function filterHarianPremiumSubmitted(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(tgl_submit) as day_name"),DB::raw('max(tgl_submit) as createdAt'))
                ->whereDay('tgl_submit', date('d'))
                ->where('status_approve', 0)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Hari', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(mst_spaj_submit.tgl_submit) as day_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->where('mst_spaj_submit.tgl_submit','<=' , Carbon::today()->subDay(6))
                ->where('mst_spaj_submit.status_approve', 0)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Mingguan', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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
                ->where('status_approve', 0)
                ->whereMonth('tgl_submit', $start)
                ->OrwhereMonth('tgl_submit', $end)
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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
                $spaj = Spaj::where('mst_spaj_submit.status_approve', 0)
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(mst_spaj_submit.tgl_submit) as year_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->whereYear('tgl_submit', $start)
                ->OrwhereYear('tgl_submit', $end)
                ->groupBy('year_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Tahun', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [(string)$value->year_name, "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    // Spaj Submitted

    function filterHarianSpajSubmitted(Request $request)
    {
        $start = $request->tgl_awal;
        $end   = $request->tgl_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(mst_spaj_submit.tgl_submit) as day_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
                ->where('mst_spaj_submit.status_approve', 0)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Hari', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), (int)$value->count];
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

    function filterMingguSpajSubmitted(Request $request)
    {
        $start = $request->tgl_awal;
        $end   = $request->tgl_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(mst_spaj_submit.tgl_submit) as day_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->where('mst_spaj_submit.tgl_submit','<=' , Carbon::today()->subDay(6))
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
                ->where('mst_spaj_submit.status_approve', 0)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();


                $api[] = ['Mingguan', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->day_name, (int)$value->count];
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

    function filterBulanSpajSubmitted(Request $request)
    {
        // $start = Carbon::parse($request->bulan_awal)->startOfMonth();
        // $end = Carbon::parse($request->bulan_akhir)->startOfMonth();
        $start = $request->tgl_awal;
        $end   = $request->tgl_akhir;
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->where('mst_spaj_submit.status_approve', 0)
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
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

    function filterTahunSpajSubmitted(Request $request)
    {
        $start = $request->tgl_awal;
        $end   = $request->tgl_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::where('mst_spaj_submit.status_approve', 0)
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(mst_spaj_submit.tgl_submit) as year_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
                ->groupBy('year_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Tahun', 'Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [$value->year_name, (int)$value->count];
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

                $api[] = ['Jumlah Spaj'];
                foreach ($spaj as $key => $value) {
                    $api[++$key] = [(int)$value->count];
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
