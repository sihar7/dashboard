<?php

namespace App\Http\Controllers\Admin\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\JenisAsuransi;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;

class jenisAsuransiController extends Controller
{
    function index(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $jenisAsuransi = JenisAsuransi::join('mst_asuransi', 'mst_jns_asuransi.id_asuransi', '=', 'mst_asuransi.id')
                ->get();
                return DataTables()->of($jenisAsuransi)
                    ->addColumn('action', function ($jenisAsuransi) {
                        return '<a href="#" class="btn btn-warning waves-effect"  data-id="'.base64_encode($jenisAsuransi['id']).'" id="buton_edit" data-toggle="modal" data-target="#editjenisAsuransi"><i class="material-icons">mode_edit</i></a> '. '&nbsp;'.'<a href="#" data-id="'.base64_encode($jenisAsuransi['id']).'" id="buton_hapus" class="m-w-150 btn btn-raised btn-danger"><i class="material-icons">delete_forever</i></a>';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['action'])
                    ->make(true);

            }
            return view('admin.masterdata.jenisAsuransi.index');
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function edit($jenisAsuransiId)
    {
        $jenisAsuransi = JenisAsuransi::whereId(base64_decode($jenisAsuransiId))->first();
        if ($jenisAsuransi) {
            return response()->json($jenisAsuransiId);
        } else {
            return response()->json('Gagal Mengambil Data');
        }
    }

    function createOrUpdate(Request $request)
    {
        $jenisAsuransi = $request->jenis_asuransi;
        $id = $request->id;
        if (!empty($id)) {
            // Update
        $updatejenisAsuransi = JenisAsuransi::whereId($id)->first();
        $updatejenisAsuransi->id = $id;
        $updatejenisAsuransi->id_asuransi = $request->id_asuransi;
        $updatejenisAsuransi->jenis_asuransi = $request->jenis_asuransi;
        $updatejenisAsuransi->save();
        return response()->json(['status' => 2], 201);
        } else {
            // Tambah
            $cekjenisAsuransi = JenisAsuransi::where('jenis_asuransi', $request->jenis_asuransi)->count();
            if ($cekjenisAsuransi == 0) {
                $createjenisAsuransi                    = new JenisAsuransi;
                $createjenisAsuransi->id                = $id;
                $createjenisAsuransi->id_asuransi       = $request->id_asuransi;
                $createjenisAsuransi->jenis_asuransi    = $request->jenis_asuransi;
                $createjenisAsuransi->save();

                return response()->json(['status' => 1], 201);
            } else {
                $data['message'] = [
                    'code' => 404,
                    'error' => true,
                    'message' => 'jenisAsuransi Telah Tersedia !'
                ];
                return response()->json($data);
            }
        }
    }

    function delete($jenisAsuransiId)
    {
        $id = base64_decode($jenisAsuransiId);
        $delete = JenisAsuransi::whereId($id)->delete();

        if ($delete) {
            return response()->json(['status' => 1], 201);
        } else {
            return response()->json(['status' => 2], 201);
        }
    }
}
