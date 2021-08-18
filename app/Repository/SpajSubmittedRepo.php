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
                    $spaj = Spaj::select(DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->where('status_approve', 0)
                    ->whereYear('tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('count', 'ASC')
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

        function premiumSubmitted()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->where('status_approve', 0)
                    ->whereYear('tgl_submit', date('Y'))
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

        function policeApprovedChart()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->where('mst_spaj_submit.status_approve', 1)
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

        function totalPremiumChart()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::select(DB::raw("SUM(mst_spaj_submit.nominal_premi) as sum_nominal"), DB::raw("COUNT(*) as count"), DB::raw("MONTHNAME(mst_spaj_submit.tgl_submit) as month_name"),DB::raw('max(mst_spaj_submit.tgl_submit) as createdAt'))
                    ->where('mst_spaj_submit.status_approve', 1)
                    ->whereYear('mst_spaj_submit.tgl_submit', date('Y'))
                    ->groupBy('month_name')
                    ->orderBy('sum_nominal', 'ASC')
                    ->get();

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

        // Count

        function spajSubmittedCountDaily()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(0)
                    ->whereDay('tgl_submit', date('d'))
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function spajSubmittedCountWeekly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::where('tgl_submit','<=',Carbon::today()->subDay(6))
                    ->whereIn('status_approve', [0])
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function spajSubmittedCountMonthly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereIn('status_approve', [0])
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function spajSubmittedCountYearly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(0)
                    ->count();

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


        function policeApprovedCountDaily()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(1)
                    ->whereDay('tgl_submit', date('d'))
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function policeApprovedCountWeekly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(1)
                    ->where('tgl_submit', '>', Carbon::today()->subDay(6))
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function policeApprovedCountMonthly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(1)
                    ->whereMonth('tgl_submit', date('m'))
                    ->count();

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

        function policeApprovedCountYearly()
        {
            DB::beginTransaction();
            try {
                if (Auth::user()->api_token) {
                    $spaj = Spaj::whereYear('tgl_submit', date('Y'))
                    ->whereStatusApprove(1)
                    ->count();

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
