<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Pltp;
class PremiumTotalController extends Controller
{

    function __construct()
    {
        $this->middleware(['has_login', 'XSS']);
    }

    // Start Premium Tahun 1
    function filterHarianPremiumTahun1(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereDay('trn_pltp.tgl_update', date('d'))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->whereIn('trn_pltp.tahun_ke', [1])
                ->groupBy('day_name')
                ->get();

                $api[] = ['Hari', ' '];
                foreach ($pltp as $key => $value) {
                    // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterMingguPremiumTahun1(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->where('trn_pltp.tgl_update','<=', Carbon::today()->subDay(6))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->whereIn('trn_pltp.tahun_ke', [1])
                ->groupBy('day_name')
                ->get();

                $api[] = ['Mingguan', ' '];
                foreach ($pltp as $key => $value) {
                    // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterBulanPremiumTahun1(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereMonth('trn_pltp.tgl_update', $start)
                ->orWhereMonth('trn_pltp.tgl_update', $end)
                ->whereIn('trn_pltp.tahun_ke', [1])
                ->groupBy('month_name')
                ->get();

                $api[] = ['Bulan', ' '];
                foreach ($pltp as $key => $value) {
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

    function filterTahunPremiumTahun1(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as year_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereYear('trn_pltp.tgl_update', $start)
                ->orWhereYear('trn_pltp.tgl_update', $end)
                ->whereIn('trn_pltp.tahun_ke', [1])
                ->groupBy('year_name')
                ->get();

                $api[] = ['Tahun', ' '];
                 foreach ($pltp as $key => $value) {
                // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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
    // End Premium Tahun 1


    // Start Pltp
    function filterHarianPltp(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereDay('trn_pltp.tgl_update', date('d'))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->where('trn_pltp.tahun_ke','>',1)
                ->groupBy('day_name')
                ->get();

                $api[] = ['Hari', ' '];
                foreach ($pltp as $key => $value) { // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterMingguPltp(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->where('trn_pltp.tgl_update','<=', Carbon::today()->subDay(6))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->where('trn_pltp.tahun_ke','>',1)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Mingguan', ' '];
                foreach ($pltp as $key => $value) {
                    // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterBulanPltp(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereMonth('trn_pltp.tgl_update', $start)
                ->orWhereMonth('trn_pltp.tgl_update', $end)
                ->where('trn_pltp.tahun_ke','>',1)
                ->groupBy('month_name')
                ->get();

                $api[] = ['Bulan', ' '];
                foreach ($pltp as $key => $value) {
                    // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterTahunPltp(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereYear('trn_pltp.tgl_update', $start)
                ->orWhereYear('trn_pltp.tgl_update', $end)
                ->where('trn_pltp.tahun_ke','>',1)
                ->groupBy('year_name')
                ->get();

                $api[] = ['Tahun', ' '];
                foreach ($pltp as $key => $value) {
                    // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
                    $api[++$key] = [(string)$value->year_name, $value->sum_nominal];
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
    // End Pltp

    // Start Premium Total
    function filterHarianPremiumTotal(Request $request)
    {
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereDay('trn_pltp.tgl_update', date('d'))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->groupBy('day_name')
                ->get();

                $api[] = ['Hari', ' '];
                foreach ($pltp as $key => $value) {
                 // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterMingguPremiumTotal(Request $request)
    {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->where('trn_pltp.tgl_update','<=', Carbon::today()->subDay(6))
                ->whereMonth('trn_pltp.tgl_update', date('m'))
                ->whereYear('trn_pltp.tgl_update', date('Y'))
                ->groupBy('day_name')
                ->get();

                $api[] = ['Mingguan', ' '];
                foreach ($pltp as $key => $value) {
                 // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterBulanPremiumTotal(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereMonth('trn_pltp.tgl_update', $start)
                ->orWhereMonth('trn_pltp.tgl_update', $end)
                ->groupBy('month_name')
                ->get();

                $api[] = ['Bulan', ' '];
                foreach ($pltp as $key => $value) {
                   // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
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

    function filterTahunPremiumTotal(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereYear('trn_pltp.tgl_update', $start)
                ->orWhereYear('trn_pltp.tgl_update', $end)
                ->groupBy('year_name')
                ->get();

                $api[] = ['Tahun', ' '];
                foreach ($pltp as $key => $value) {
                 // $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), "Rp".number_format((int)$value->sum_nominal, 0, ',', '.')];
                 $api[++$key] = [(string)$value->year_name, $value->sum_nominal];
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

    // End Premium Total
}
