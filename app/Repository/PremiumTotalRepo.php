<?php
    namespace App\Repository;

    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use function PHPUnit\Framework\isNull;
    use Illuminate\Http\Request;
    use Validator,Redirect,Response,File;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Spaj;
    use App\Models\Pltp;

    class PremiumTotalRepo
    {
        function premiumTahun1Chart()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {

                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                    ->where('trn_pltp.tahun_ke', 1)
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();

                    // $api[] = ['Bulan', 'Jumlah Spaj'];
                    // foreach ($spaj as $key => $value) {
                    //     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
                    // }

                    return $pltp;

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

        function premiumPltpChart()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                    ->where('trn_pltp.tahun_ke', '>' , 1)
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();

                    // $api[] = ['Bulan', 'Jumlah Spaj'];
                    // foreach ($spaj as $key => $value) {
                    //     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
                    // }

                    return $pltp;

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

        function premiumTotalChart()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->select(DB::raw("SUM(trn_pltp.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(trn_pltp.tgl_update) as month_name"),DB::raw('max(trn_pltp.tgl_update) as createdAt'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('createdAt')
                    ->get();

                    // $api[] = ['Bulan', 'Jumlah Spaj'];
                    // foreach ($spaj as $key => $value) {
                    //     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
                    // }

                    return $pltp;

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

        // Count
        function premiumTotalCountDaily()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->whereDay('trn_pltp.tgl_update', date('d'))
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->orderBy('createdAt')
                    ->count();

                    return $pltp;

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

        function premiumTotalCountWeekly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->where('trn_pltp.tgl_update', '>', Carbon::today()->subDay(6))
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->count();

                    // $api[] = ['Bulan', 'Jumlah Spaj'];
                    // foreach ($spaj as $key => $value) {
                    //     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
                    // }

                    return $pltp;

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

        function premiumTotalCountMonthly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->whereMonth('trn_pltp.tgl_update', date('m'))
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->count();

                    return $pltp;

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

        function premiumTotalCountYearly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
                    ->whereYear('trn_pltp.tgl_update', date('Y'))
                    ->count();

                    return $pltp;

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

?>
