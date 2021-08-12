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
    function premiumTahun1Daily(Request $request)
    {
        $start = $request->hari_awal;
        $end   = $request->hari_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE(trn_pltp.tgl_update) >= '".$start."'")
                ->whereRaw("DATE(trn_pltp.tgl_update) <= '".$end."'")
                ->where('trn_pltp.tahun_ke', 1)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Hari', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), (int)$value->sum_nominal];
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

    function premiumTahun1Weekly(Request $request)
    {
        $start_bulan = $request->bulan_awal;
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->where('trn_pltp.tgl_update','<=' , Carbon::today()->subDay(6))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start_bulan."'")
                ->where('trn_pltp.tahun_ke', 1)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Mingguan', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [$value->day_name, (int)$value->sum_nominal];
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

    function premiumTahun1Monthly(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') <= '".$end."'")
                ->where('trn_pltp.tahun_ke', 1)
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->sum_nominal];
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

    function premiumTahun1Yearly(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') <= '".$end."'")
                ->groupBy('year_name')
                ->where('trn_pltp.tahun_ke', 1)
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Tahun', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [$value->year_name, (int)$value->sum_nominal];
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
    // End Premium Tahun 1


    // Start Pltp
    function pltpDaily(Request $request)
    {
        $start = $request->hari_awal;
        $end   = $request->hari_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE(trn_pltp.tgl_update) >= '".$start."'")
                ->whereRaw("DATE(trn_pltp.tgl_update) <= '".$end."'")
                ->where('trn_pltp.tahun_ke', '>', 1)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Hari', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), (int)$value->sum_nominal];
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

    function pltpWeekly(Request $request)
    {
        $start_bulan = $request->bulan_awal;
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->where('trn_pltp.tgl_update','<=' , Carbon::today()->subDay(6))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start_bulan."'")
                ->where('trn_pltp.tahun_ke','>', 1)
                ->groupBy('day_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Mingguan', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [$value->day_name, (int)$value->sum_nominal];
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

    function pltpMonthly(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') <= '".$end."'")
                ->where('trn_pltp.tahun_ke', '>', 1)
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->sum_nominal];
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

    function pltpYearly(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') <= '".$end."'")
                ->groupBy('year_name')
                ->where('trn_pltp.tahun_ke', '>' , 1)
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Tahun', 'Premium'];
                foreach ($pltp as $key => $value) {
                    $api[++$key] = [$value->year_name, (int)$value->sum_nominal];
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
     function premiumTotalDaily(Request $request)
     {
         $start = $request->hari_awal;
         $end   = $request->hari_akhir;
         try {
             if (Auth::user()->api_token) {
                 $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                 ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                 ->whereRaw("DATE(trn_pltp.tgl_update) >= '".$start."'")
                 ->whereRaw("DATE(trn_pltp.tgl_update) <= '".$end."'")
                 ->groupBy('day_name')
                 ->orderBy('createdAt')
                 ->get();

                 $api[] = ['Hari', 'Premium'];
                 foreach ($pltp as $key => $value) {
                     $api[++$key] = [Carbon::parse($value->day_name)->isoFormat('dddd'), (int)$value->sum_nominal];
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

     function premiumTotalWeekly(Request $request)
     {
         $start_bulan = $request->bulan_awal;
         DB::beginTransaction();
         try {
             if (Auth::user()->api_token) {
                 $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                 ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("DAYNAME(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                 ->where('trn_pltp.tgl_update','<=' , Carbon::today()->subDay(6))
                 ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start_bulan."'")
                 ->groupBy('day_name')
                 ->orderBy('createdAt')
                 ->get();

                 $api[] = ['Mingguan', 'Premium'];
                 foreach ($pltp as $key => $value) {
                     $api[++$key] = [$value->day_name, (int)$value->sum_nominal];
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

     function premiumTotalMonthly(Request $request)
     {
         $start = $request->bulan_awal;
         $end   = $request->bulan_akhir;
         try {
             if (Auth::user()->api_token) {
                 $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                 ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                 ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') >= '".$start."'")
                 ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%m') <= '".$end."'")
                 ->groupBy('month_name')
                 ->orderBy('createdAt')
                 ->get();

                 $api[] = ['Bulan', 'Premium'];
                 foreach ($pltp as $key => $value) {
                     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->sum_nominal];
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

     function premiumTotalYearly(Request $request)
     {
         $start = $request->tahun_awal;
         $end   = $request->tahun_akhir;

         DB::beginTransaction();
         try {
             if (Auth::user()->api_token) {
                 $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                 ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(trn_pltp.*) as count"), DB::raw("YEAR(trn_pltp.tgl_update) as day_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                 ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') >= '".$start."'")
                 ->whereRaw("DATE_FORMAT(trn_pltp.tgl_update, '%Y') <= '".$end."'")
                 ->groupBy('year_name')
                 ->orderBy('createdAt')
                 ->get();

                 $api[] = ['Tahun', 'Premium'];
                 foreach ($pltp as $key => $value) {
                     $api[++$key] = [$value->year_name, (int)$value->sum_nominal];
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
