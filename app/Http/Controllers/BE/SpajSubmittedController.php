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
        $this->middleware(['has_login','SecureHeaders', 'XSS']);
    }

    function filterMingguSpajSubmitted(Request $request)
    {
        DB::beginTransaction();
        try {
            $spaj = DB::connection('mysql2')->table('t_spaj')->leftJoin('t_premi', function ($join) {
                $join->on('t_spaj.id_premi', '=', 't_premi.id')
                ->where('t_spaj.jns_asuransi', '=',  null);
            })->leftJoin('t_premi_pa_car', function ($join) {
                $join->on('t_spaj.id_premi', '=', 't_premi_pa_car.id')
                ->where('t_spaj.jns_asuransi', '=',  1);

            })
            ->select(DB::raw("SUM(t_premi.nominal) as sum, SUM(t_premi_pa_car.nominal) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEARWEEK(t_spaj.created_at) as week_name"),DB::raw('max(t_spaj.created_at) as createdAt'))
            // ->whereBetween('t_spaj.created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->where('t_spaj.created_at','>=' , Carbon::today()->subDay(7))
            ->groupBy('week_name')
            ->orderBy('createdAt')
            ->get();

            $api[] = ['Mingguan', 'Premium'];
            foreach ($spaj as $key => $value) {
                $total = $value->sum += $value->sum_nominal;
                $api[++$key] = [$value->week_name, (int)$total];
            }
            return response()->json(['api' => $api], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();


    }

    function filterBulanSpajSubmitted(Request $request)
    {

        DB::beginTransaction();

        $start = Carbon::parse($request->tanggal_awal)->startOfMonth();
        $end = Carbon::parse($request->tanggal_akhir)->startOfMonth();

        try {
            if (Auth::user()->remember_token) {
                $spaj = DB::connection('mysql2')->table('t_spaj')->leftJoin('t_premi', function ($join) {
                    $join->on('t_spaj.id_premi', '=', 't_premi.id')
                    ->where('t_spaj.jns_asuransi', '=',  null);
                })->leftJoin('t_premi_pa_car', function ($join) {
                    $join->on('t_spaj.id_premi', '=', 't_premi_pa_car.id')
                    ->where('t_spaj.jns_asuransi', '=',  1);

                })
                ->select(DB::raw("SUM(t_premi.nominal) as sum, SUM(t_premi_pa_car.nominal) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(t_spaj.created_at) as month_name"),DB::raw('max(t_spaj.created_at) as createdAt'))
                ->whereBetween('t_spaj.created_at', [$start, $end])
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                $api[] = ['Bulan', 'Premium'];
                foreach ($spaj as $key => $value) {
                    $total = $value->sum += $value->sum_nominal;
                    $api[++$key] = [$value->month_name, (int)$total];
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
    function filterTahunSpajSubmitted(Request $request)
    {

        DB::beginTransaction();
        try {
            $spaj = DB::connection('mysql2')->table('t_spaj')
            ->leftJoin('t_premi', function ($join) {
                $join->on('t_spaj.id_premi', '=', 't_premi.id')
                ->where('t_spaj.jns_asuransi', '=',  null);
            })->leftJoin('t_premi_pa_car', function ($join) {
                $join->on('t_spaj.id_premi', '=', 't_premi_pa_car.id')
                ->where('t_spaj.jns_asuransi', '=',  1);
            })
            ->select(DB::raw("SUM(t_premi.nominal) as sum, SUM(t_premi_pa_car.nominal) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("YEAR(t_spaj.created_at) as year_name"),DB::raw('max(t_spaj.created_at) as createdAt'))
            ->whereBetween('t_spaj.created_at', [$request->tanggal_awal, $request->tanggal_akhir])
            ->groupBy('year_name')
            ->orderBy('createdAt')
            ->get();

            $api[] = ['Tahun', 'Premium'];
            foreach ($spaj as $key => $value) {
                $total = $value->sum += $value->sum_nominal;
                $api[++$key] = [$value->year_name, (int)$total];
            }

            return response()->json(['api' => $api], 201);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
    }

}
