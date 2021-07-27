<?php
    namespace App\Repository;

    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use function PHPUnit\Framework\isNull;
    use Illuminate\Database\Eloquent\ModelNotFoundException;

    class TeleRepo
    {
        function getTeleRewardPendapatan()
        {
            try {
                $spaj =  DB::connection('mysql2')->table('t_spaj')->join('t_user', 't_spaj.created_by', '=', 't_user.id')
                ->select(DB::raw('count(t_spaj.created_by) as spaj_count, t_user.nama as nama_tele, t_user.id as id_user, t_spaj.created_at', DB::raw('max(spaj_count) as total_max')))
                ->whereMonth('t_spaj.created_at', date('m'))
                ->groupBy('t_spaj.created_by')
                ->orderBy('spaj_count', 'DESC')
                ->first();

                $premi = DB::connection('mysql2')->table('t_spaj')->leftJoin('t_premi', function ($join) {
                    $join->on('t_spaj.id_premi', '=', 't_premi.id')
                    ->where('t_spaj.jns_asuransi', '=',  null);
                })->leftJoin('t_premi_pa_car', function ($join) {
                    $join->on('t_spaj.id_premi', '=', 't_premi_pa_car.id')
                    ->where('t_spaj.jns_asuransi', '=',  1);
                })
                ->select(DB::raw("SUM(t_premi.nominal) as sum, SUM(t_premi_pa_car.nominal) as sum_nominal"),DB::raw('max(t_spaj.created_at) as createdAt'))
                ->where('t_spaj.created_by', $spaj->id_user)
                ->get();


                $api[] = ['nama_tele','Total Pendapatan'];
                foreach ($premi as $key => $value) {
                    $total = $value->sum += $value->sum_nominal;
                    $api[++$key] = [$spaj->nama_tele, 'Rp. '.number_format($total, 0, ',', '.').''];
                }

                return response()->json(['api' => $api], 201);

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
