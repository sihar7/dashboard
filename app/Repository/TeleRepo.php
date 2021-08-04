<?php
    namespace App\Repository;

    use App\Models\Spaj;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use function PHPUnit\Framework\isNull;
    use Illuminate\Database\Eloquent\ModelNotFoundException;
    use App\Models\Telemarketing;
    class TeleRepo
    {
        function getRewardIndividu()
        {
            try {
                $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit'))
                ->where('mst_spaj_submit.status_approve', 1)
                ->whereMonth('mst_spaj_submit.tgl_submit', date('m'))
                ->whereYear('mst_spaj_submit.tgl_submit', date('Y'))
                ->groupBy('mst_spaj_submit.tgl_submit')
                ->orderBy('spaj_count', 'DESC')
                ->get();

                $row = [];
                    foreach ($tele as $data) {
                        $row['id_tele'] = $data->id_tele;
                        $item_data      = (object)$row;
                }


                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('status_approve', 1)
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->where('mst_spaj_submit.id_telemarketing', $item_data->id_tele)
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }

                $total_pendapatan = $premi;

                return $total_pendapatan;

              } catch (ModelNotFoundException $exception) {

                return response()->json(['error' => $exception->getMessage()], 201);
              }
        }

        function getHistoryTele()
        {
            try {
                $tele = Telemarketing::join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
                ->select(
                    'mst_telemarketing.*',
                    'mst_asuransi.*',
                )
                ->where('mst_telemarketing.aktif', '1')
                ->orderBy('mst_telemarketing.islogin', 'DESC')
                ->orderBy('mst_telemarketing.last_login_at', 'DESC')
                ->orderBy('mst_telemarketing.nama', 'DESC')
                ->cursorPaginate(5);

                return $tele;

              } catch (ModelNotFoundException $exception) {

                return response()->json(['error' => $exception->getMessage()], 201);
              }
        }

        function filterTotalTopTsr()
        {
                $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->join('mst_asuransi', 'mst_telemarketing.role', '=', 'mst_asuransi.id')
                ->join('mst_jns_asuransi', 'mst_spaj_submit.jns_asuransi', '=', 'mst_jns_asuransi.id')
                ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit, mst_spaj_submit.jns_asuransi '))
                ->where('mst_spaj_submit.status_approve', 1)
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
            }
    }

?>
