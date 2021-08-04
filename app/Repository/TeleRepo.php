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

        function getTeleReward()
        {
            try {
                $tele = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
                ->select(DB::raw('count(mst_spaj_submit.id_telemarketing) as spaj_count, sum(mst_spaj_submit.nominal_premi) as total_max, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as id_tele, mst_spaj_submit.tgl_submit'))
                ->where('mst_spaj_submit.status_approve', 1)
                ->whereMonth('mst_spaj_submit.tgl_submit', date('m'))
                ->whereYear('mst_spaj_submit.tgl_submit', date('Y'))
                ->groupBy('mst_spaj_submit.id_telemarketing')
                ->orderBy('spaj_count', 'DESC')
                ->orderBy('total_max', 'DESC')
                ->first();


                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum"))
                ->where('status_approve', 1)
                ->whereMonth('tgl_submit', date('m'))
                ->whereYear('tgl_submit', date('Y'))
                ->where('id_telemarketing', $tele->id_tele)
                ->orderBy('sum', 'DESC')
                ->get();

                $premi = [];
                foreach ($spaj as $item) {
                    $premi[] = $item->sum;
                }


                $data['total_pendapatan'] = $item->sum;;
                $data['nama']             = $tele->nama_tele;
                $data['count']            = $tele->spaj_count;

                return $data;

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

        function topTsr10()
        {
            $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->select(DB::raw('count(mst_spaj_submit.tgl_submit) as spaj_count, sum(mst_spaj_submit.nominal_premi) as total_max, mst_telemarketing.nama as nama_tele, mst_telemarketing.id as telemarketing_id, mst_spaj_submit.tgl_submit'))
            ->whereMonth('mst_spaj_submit.tgl_submit', date('m'))
            ->whereYear('mst_spaj_submit.tgl_submit', date('Y'))
            ->groupBy('mst_spaj_submit.id_telemarketing')
            ->orderBy('spaj_count', 'DESC')
            ->orderBy('total_max', 'DESC')
            ->where('mst_spaj_submit.status_approve', 1)
            ->limit(10)
            ->get();

            if ($spaj) {
                return $spaj;
            } else {
                abort(403);
            }

        }
    }

?>
