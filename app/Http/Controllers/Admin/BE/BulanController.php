<?php

namespace App\Http\Controllers\Admin\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Bulan;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;

class BulanController extends Controller
{
    function index(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $Bulan = Bulan::latest()->get();
                return DataTables()->of($Bulan)
                    ->addColumn('action', function ($Bulan) {
                        return '<a href="#" class="btn btn-warning waves-effect"  data-id="'.base64_encode($Bulan['id']).'" id="buton_edit" data-toggle="modal" data-target="#editBulan"><i class="material-icons">mode_edit</i></a> '. '&nbsp;'.'<a href="#" data-id="'.base64_encode($Bulan['id']).'" id="buton_hapus" class="m-w-150 btn btn-raised btn-danger"><i class="material-icons">delete_forever</i></a>';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);

            }
            return view('admin.masterdata.bulan.index');
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function edit($BulanId)
    {
        $Bulan = Bulan::whereId(base64_decode($BulanId))->first();
        if ($Bulan) {
            return response()->json($Bulan);
        } else {
            return response()->json('Gagal Mengambil Data');
        }
    }

    function createOrUpdate(Request $request)
    {
        $namaBulan = $request->bulan;
        $id = $request->id;
        if (!empty($id)) {
            // Update
        $updateBulan = Bulan::whereId($id)->first();
        $updateBulan->bulan = $namaBulan;
        $updateBulan->save();
        return response()->json(['status' => 2], 201);
        } else {
            // Tambah
            $cekBulan = Bulan::where('bulan', $namaBulan)->count();
            if ($cekBulan == 0) {
                $createBulan  = new Bulan;
                $createBulan->bulan = $namaBulan;
                $createBulan->save();

                return response()->json(['status' => 1], 201);
            } else {
                $data['message'] = [
                    'code' => 404,
                    'error' => true,
                    'message' => 'Bulan Telah Tersedia !'
                ];
                return response()->json($data);
            }
        }
    }

    function delete($BulanId)
    {
        $id = base64_decode($BulanId);
        $delete = Bulan::whereId($id)->first();
        $delete->aktif = '0';
        $delete->save();

        if ($delete) {
            return response()->json(['status' => 1], 201);
        } else {
            return response()->json(['status' => 2], 201);
        }
    }
}
