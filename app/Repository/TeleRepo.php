<?php
    namespace App\Repository;

    use App\Models\Spaj;
    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use function PHPUnit\Framework\isNull;
    use Illuminate\Database\Eloquent\ModelNotFoundException;

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
                    $item_data = (object)$row;
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

        function getTeleOnline()
        {
            $spaj =  DB::connection('mysql2')->table('t_user')->where('t_login.logged_in', '1')
            ->join('t_login', 't_user.id_login', '=', 't_login.id')
            ->where('t_login.active', '1')
            ->where('t_login.role', '3')
            ->select(
                't_user.id as id_tele',
                't_user.nama as nama_tele'
            )->get();

            return $spaj;
        }

        function getHistoryTele()
        {
            $tele =  DB::connection('mysql2')->table('t_user')->join('t_login', 't_user.id_login', '=', 't_login.id')
            ->where('t_login.active', '1')
            ->where('t_login.role', '3')
            ->select(
                't_user.id as id_tele',
                't_user.nama as nama_tele',
                't_login.logged_in as status_login',
                't_login.last_login as date_login'
            )
            ->orderBy('t_login.logged_in', 'DESC')
            ->orderBy('t_login.last_login', 'DESC')
            ->orderBy('t_user.nama', 'ASC')
            ->paginate(7);

            return $tele;
        }
    }

?>
