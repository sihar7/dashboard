<?php
    namespace App\Repository;

    use Illuminate\Support\Facades\DB;
    use Carbon\Carbon;
    use function PHPUnit\Framework\isNull;
    use Illuminate\Http\Request;
    use Validator,Redirect,Response,File;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Spaj;

    class SpajSubmittedRepo
    {
        function spajSubmitted()
        {
        DB::beginTransaction();
        try {
            if (Auth::user()->api_token) {
                $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                ->where('mst_spaj_submit.status_approve', 0)
                ->whereYear('mst_spaj_submit.tgl_submit', date('Y'))
                ->groupBy('month_name')
                ->orderBy('createdAt')
                ->get();

                // $api[] = ['Bulan', 'Jumlah Spaj'];
                // foreach ($spaj as $key => $value) {
                //     $api[++$key] = [Carbon::parse($value->month_name)->isoFormat('MMMM'), (int)$value->count];
                // }

                return $spaj;

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
