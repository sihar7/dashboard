<?php

namespace App\Http\Controllers\Admin\BE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Asuransi;
use Illuminate\Support\Facades\Auth;
use Validator,Redirect,Response,File;

class AsuransiController extends Controller
{
    function index(Request $request)
    {
        if (Auth::user()->api_token) {
            if($request->ajax()) {
                $asuransi = Asuransi::where('aktif', '1')->orderBy('id', 'DESC')->get();
                return DataTables()->of($asuransi)
                    ->addColumn('action', function ($asuransi) {
                        return '<a href="#" class="btn btn-warning waves-effect"  data-id="'.base64_encode($asuransi['id']).'" id="buton_edit" data-toggle="modal" data-target="#editAsuransi"><i class="material-icons">mode_edit</i></a> '. '&nbsp;'.'<a href="#" data-id="'.base64_encode($asuransi['id']).'" id="buton_hapus" class="m-w-150 btn btn-raised btn-danger"><i class="material-icons">delete_forever</i></a>';
                    })
                    ->editColumn('logo', function($asuransi){
                        return '<img src="'.url('property/asuransi',$asuransi['logo']).'" width="90px" height="90px">';
                    })
                    ->addIndexColumn()
                    ->rawColumns(['logo', 'action'])
                    ->make(true);

            }
            return view('admin.masterdata.asuransi.index');
        } else {

            $data = [
                'message' => 'Token Tidak Ditemukan',
                'error' => true,
                'code' => 403
            ];

            return response()->json(['api' => $data], 201);
        }
    }

    function edit($asuransiId)
    {
        $asuransi = Asuransi::whereId(base64_decode($asuransiId))->first();
        if ($asuransi) {
            return response()->json($asuransi);
        } else {
            return response()->json('Gagal Mengambil Data');
        }
    }

    function createOrUpdate(Request $request)
    {
        $namaAsuransi = $request->namaAsuransi;
        $id = $request->id;
        if (!empty($id)) {
            // Update
            $updateAsuransi = Asuransi::whereId($id)->first();
            if ($request->hasFile('logo')) {
                File::delete('property/asuransi/'.$updateAsuransi->logo);

                $original_filename = $request->file('logo')->getClientOriginalName();
                $original_filename_arr = explode('.', $original_filename);
                $file_ext = end($original_filename_arr);
                $destination_path = 'public/property/asuransi/';
                $image = 'U-' . time() . '.' . $file_ext;

                if ($request->file('logo')->move($destination_path, $image)) {
                    $updateAsuransi->logo = $image;
                    $updateAsuransi->save();
                }
            }
          $updateAsuransi->nama_asuransi = $namaAsuransi;
          $updateAsuransi->save();

          return response()->json(['status' => 2], 201);
        } else {
            // Tambah
            $cekAsuransi = Asuransi::where('nama_asuransi', $namaAsuransi)->count();
            if ($cekAsuransi == 0) {
                $createAsuransi  = new Asuransi;
                $createAsuransi->nama_asuransi = $namaAsuransi;
                $createAsuransi->save();
                if ($request->hasFile('logo')) {
                    $original_filename = $request->file('logo')->getClientOriginalName();
                    $original_filename_arr = explode('.', $original_filename);
                    $file_ext = end($original_filename_arr);
                    $destination_path = 'public/property/asuransi/';
                    $image = 'U-' . time() . '.' . $file_ext;
                    if ($request->file('logo')->move($destination_path, $image)) {
                        $createAsuransi->logo = $image;
                        $createAsuransi->save();
                    } else {
                        $data['message'] = [
                            'code' => 404,
                            'error' => true,
                            'message' => 'Gagal Memproses Logo'
                        ];
                        return response()->json($data);
                    }
                } else {
                    $data['message'] = [
                        'code' => 404,
                        'error' => true,
                        'message' => 'Tidak Ditemukan File Logo'
                    ];
                    return response()->json($data);
                }

            return response()->json(['status' => 1], 201);
            } else {
                $data['message'] = [
                    'code' => 404,
                    'error' => true,
                    'message' => 'Asuransi Telah Tersedia !'
                ];
                return response()->json($data);
            }
        }
    }

    function delete($asuransiId)
    {
        $id = base64_decode($asuransiId);
        $delete = Asuransi::whereId($id)->first();
        $delete->aktif = '0';
        $delete->save();

        if ($delete) {
            return response()->json(['status' => 1], 201);
        } else {
            return response()->json(['status' => 2], 201);
        }
    }
}
