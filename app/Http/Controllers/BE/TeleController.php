<?php

namespace App\Http\Controllers\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class TeleController extends Controller
{
    function __construct()
    {
        $this->middleware(['has_login', 'XSS']);
    }

    function filterHarianTopTsr(Request $request)
    {
        $start = $request->hari_awal;
        $end   = $request->hari_akhir;

        if (Auth::user()->api_token) {
            $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
            ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
            ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
            ->where('mst_spaj_submit.status_approve', 1)
            ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
            ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->orderBy('spaj_count')
            ->limit(10)
            ->get();

            $row = [];
            foreach ($tele as $data) {
                $row['id_tele'] = $data->id_tele;
                $item_data = (object)$row;
            }

            if ($item_data) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_spaj_submit.asuransi', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('mst_spaj_submit.status_approve',1)
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) >= '".$start."'")
                ->whereRaw("DATE(mst_spaj_submit.tgl_submit) <= '".$end."'")
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }
                $data['nama_tele'] = $tele->nama_tele;
                $data['total_pendapatan'] = $premi;

                $data = [
                    'data' => $data,
                    'error' => false,
                    'code' => 200
                ];

                return response()->json(['api' => $data], 201);
            } else {
                $data = [
                    'message' => 'Tele Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
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

    function filterMingguTopTsr(Request $request)
    {
        $start_bulan = $request->bulan_awal;
        if (Auth::user()->api_token) {
            $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
            ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
            ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
            ->where('mst_spaj_submit.status_approve', 1)
            ->where('mst_spaj_submit.tgl_submit','<=' , Carbon::today()->subDay(6))
            ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') >= '".$start_bulan."'")
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->orderBy('spaj_count')
            ->limit(10)
            ->get();

            $row = [];
            foreach ($tele as $data) {
                $row['id_tele'] = $data->id_tele;
                $item_data = (object)$row;
            }

            if ($item_data) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_spaj_submit.asuransi', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('mst_spaj_submit.status_approve',1)
                ->where('mst_spaj_submit.tgl_submit','<=' , Carbon::today()->subDay(6))
                ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') >= '".$start_bulan."'")
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }
                $data['nama_tele'] = $tele->nama_tele;
                $data['total_pendapatan'] = $premi;

                $data = [
                    'data' => $data,
                    'error' => false,
                    'code' => 200
                ];

                return response()->json(['api' => $data], 201);
            } else {
                $data = [
                    'message' => 'Tele Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
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

    function filterBulanTopTsr(Request $request)
    {
        $start = $request->bulan_awal;
        $end   = $request->bulan_akhir;

        if (Auth::user()->api_token) {
            $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
            ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
            ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
            ->where('mst_spaj_submit.status_approve', 1)
            ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') >= '".$start."'")
            ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') <= '".$end."'")
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->orderBy('spaj_count')
            ->limit(10)
            ->get();

            $row = [];
            foreach ($tele as $data) {
                $row['id_tele'] = $data->id_tele;
                $item_data = (object)$row;
            }

            if ($item_data) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_spaj_submit.asuransi', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('mst_spaj_submit.status_approve',1)
                ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%m') <= '".$end."'")
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }
                $data['nama_tele'] = $tele->nama_tele;
                $data['total_pendapatan'] = $premi;

                $data = [
                    'data' => $data,
                    'error' => false,
                    'code' => 200
                ];

                return response()->json(['api' => $data], 201);
            } else {
                $data = [
                    'message' => 'Tele Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
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

    function filterTahunTopTsr(Request $request)
    {
        $start = $request->tahun_awal;
        $end   = $request->tahun_akhir;

        if (Auth::user()->api_token) {
            $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
            ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
            ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
            ->where('mst_spaj_submit.status_approve', 1)
            ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%Y') >= '".$start."'")
            ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%Y') <= '".$end."'")
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->orderBy('spaj_count')
            ->limit(10)
            ->get();

            $row = [];
            foreach ($tele as $data) {
                $row['id_tele'] = $data->id_tele;
                $item_data = (object)$row;
            }

            if ($item_data) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_spaj_submit.asuransi', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('mst_spaj_submit.status_approve',1)
                ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%Y') >= '".$start."'")
                ->whereRaw("DATE_FORMAT(mst_spaj_submit.tgl_submit, '%Y') <= '".$end."'")
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }
                $data['nama_tele'] = $tele->nama_tele;
                $data['total_pendapatan'] = $premi;

                $data = [
                    'data' => $data,
                    'error' => false,
                    'code' => 200
                ];

                return response()->json(['api' => $data], 201);
            } else {
                $data = [
                    'message' => 'Tele Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
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

    function filterTotalTopTsr(Request $request)
    {
        if (Auth::user()->api_token) {
            $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
            ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
            ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
            ->where('mst_spaj_submit.status_approve', 1)
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->whereMonth('mst_spaj_submit.tgl_submit', date('m'))
            ->orderBy('spaj_count')
            ->limit(10)
            ->get();

            $row = [];
            foreach ($tele as $data) {
                $row['id_tele'] = $data->id_tele;
                $item_data = (object)$row;
            }

            if ($item_data) {
                $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_spaj_submit.asuransi', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('mst_spaj_submit.status_approve', 1)
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->whereMonth('mst_spaj_submit.tgl_submit', date('m'))
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }
                $data['nama_tele'] = $tele->nama_tele;
                $data['total_pendapatan'] = $premi;

                $data = [
                    'data' => $data,
                    'error' => false,
                    'code' => 200
                ];

                return response()->json(['api' => $data], 201);
            } else {
                $data = [
                    'message' => 'Tele Tidak Ditemukan',
                    'error' => true,
                    'code' => 403
                ];

                return response()->json(['api' => $data], 201);
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
}
