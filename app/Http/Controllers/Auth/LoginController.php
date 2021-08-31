<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asuransi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    function generateRandomString($length = 80)
    {
        $karakkter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakkter);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $karakkter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }

    function postlogin(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        Log::info('Proses login dengan username : ' . $request->username);

        $username = $request->username;
        $password = $request->password;

        $validate = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validate->fails()) {
            return response()->json(['status' => 5], 201);
        }
        $remember_me  = (!empty($request->remember_me)) ? TRUE : FALSE;
        try {
            if (Auth::attempt(['username' => $username, 'password' => $password])) {
                $cek_online = User::cekUsername($username);
                $islogin = $cek_online->islogin;
                $newtoken  = $this->generateRandomString();
                if ($islogin == 0 || $islogin == null) {
                    if ($request->user()->hasRole('management')) {
                        $user                 = User::cekUsername($username);
                        $user->last_login_at  = Carbon::now()->toDateTimeString();
                        $user->last_login_ip  = $request->ip();
                        $user->islogin        = 1;
                        $user->api_token      = 'TOKEN-MANAGEMENT-' . $newtoken;
                        $user->save();

                        Auth::login($user, $remember_me);
                        Log::info('Berhasil Login Dengan Role Management dan Username : ' . $request->username . ' ' . 'Token' . ' ' . $user->api_token);

                        return response()->json(['message' => 1], 201);
                    } elseif ($request->user()->hasRole('partner')) {

                        if ($cek_online->id_asuransi != null && $cek_online->id_asuransi != 0) {
                            $get_asuransi = User::join('mst_asuransi', 'mst_user.id_asuransi', '=', 'mst_asuransi.id')
                                ->where('mst_user.username', $cek_online->username)
                                ->select('mst_user.*', 'mst_asuransi.nama_asuransi', 'mst_asuransi.logo as logo_asuransi', 'mst_asuransi.id as asuransi_id')->first();

                            $user                = User::cekUsername($username);
                            $user->last_login_at = Carbon::now()->toDateTimeString();
                            $user->last_login_ip = $request->ip();
                            $user->islogin       = 1;
                            $user->api_token     = 'PARTNER-TOKEN-' . $newtoken;
                            $user->save();

                            $data_session = [
                                'nama_asuransi' => $get_asuransi->nama_asuransi,
                                'logo_asuransi' => $get_asuransi->logo_asuransi
                            ];

                            $request->session()->put($data_session);
                            Log::info('Berhasil Login Dengan Role Partner dan Username serta asuransi : ' . $request->username . ' '  . 'Token' . ' ' . $user->api_token . 'Asuransi' . $get_asuransi->nama_asuransi);
                        } else {
                            $user                = User::cekUsername($username);
                            $user->last_login_at = Carbon::now()->toDateTimeString();
                            $user->last_login_ip = $request->ip();
                            $user->islogin       = 1;
                            $user->api_token     = 'PARTNER-TOKEN-' . $newtoken;
                            $user->save();
                        }
                        Log::info('Berhasil Login Dengan Role Partner dan Username : ' . $request->username . ' '  . 'Token' . ' ' . $user->api_token);

                        Auth::login($user, $remember_me);
                        return response()->json(['message' => 2], 201);
                    } elseif ($request->user()->hasRole('telemarketing')) {
                        if ($cek_online->id_telemarketing != null && $cek_online->id_telemarketing != 0) {
                            $get_asuransi = User::join('mst_telemarketing', 'mst_telemarketing.id_telemarketing', '=', 'mst_telemarketing.id')
                                ->where('mst_user.username', $cek_online->username)
                                ->select('mst_user.*', 'mst_telemarketing.nama as nama_tele', 'mst_telemarketing.foto as foto_tele', 'mst_telemarketing.id as tele_id')->first();

                            $user                = User::cekUsername($username);
                            $user->last_login_at = Carbon::now()->toDateTimeString();
                            $user->last_login_ip = $request->ip();
                            $user->islogin       = 1;
                            $user->api_token     = 'TELE-TOKEN' . $newtoken;
                            $user->save();

                            $tele                = DB::table('mst_telemarketing')->whereId($get_asuransi->tele_id)
                                ->first();
                            $tele->islogin       = 1;
                            $tele->last_login_at = Carbon::now()->toDateTimeString();
                            $tele->save();

                            $data_session = [
                                'nama_tele' => $get_asuransi->nama_tele,
                                'foto_tele' => $get_asuransi->foto_tele
                            ];

                            $request->session()->put($data_session);
                            Log::info('Berhasil Login Dengan Role Partner dan Username serta asuransi : ' . $request->username . ' '  . 'Token' . ' ' . $user->api_token . 'Asuransi' . $get_asuransi->nama_asuransi);
                        } else {
                            $user                = User::cekUsername($username);
                            $user->last_login_at = Carbon::now()->toDateTimeString();
                            $user->last_login_ip = $request->ip();
                            $user->islogin       = 1;
                            $user->api_token     = 'TELE-TOKEN-' . $newtoken;
                            $user->save();
                        }
                        Log::info('Berhasil Login Dengan Role Partner dan Username : ' . $request->username . ' '  . 'Token' . ' ' . $user->api_token);


                        Auth::login($user, $remember_me);
                        return response()->json(['message' => 7], 201);
                    } else if ($request->user()->hasRole('report')) {
                        $user                 = User::cekUsername($username);
                        $user->last_login_at  = Carbon::now()->toDateTimeString();
                        $user->last_login_ip  = $request->ip();
                        $user->islogin        = 1;
                        $user->api_token      = 'TOKEN-REPORT-' . $newtoken;
                        $user->save();

                        Auth::login($user, $remember_me);
                        Log::info('Berhasil Login Dengan Role Management dan Username : ' . $request->username . ' ' . 'Token' . ' ' . $user->api_token);

                        return response()->json(['message' => 8], 201);
                    }
                } else {
                    Log::info('User Already Login : ' . $request->username);
                    return response()->json(['status' => 6, 'message' => 'User Already Login !'], 203);
                }
            } else {
                Log::info('Gagal Login : ' . $request->username);
                return response()->json(['status' => 3, 'message' => 'username atau Password Salah !'], 203);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    function loginmanagement()
    {
        $data['judul'] = 'Login Management';
        $data['nama'] = 'Management';
        Session::put('url.intended', URL::previous());
        return view('auth.login', $data);
    }

    function loginpartner()
    {
        $data['judul'] = 'Login Partner';
        $data['nama'] = 'Partner';

        Session::put('url.intended', URL::previous());
        return view('auth.login', $data);
    }

    function logintele()
    {
        $data['judul'] = 'Login Tele';
        $data['nama']  = 'Telemarketing';

        Session::put('url.intended', URL::previous());
        return view('auth.login', $data);
    }

    function loginreport()
    {
        $data['judul'] = 'Login Report';
        $data['nama']  = 'Report';

        Session::put('url.intended', URL::previous());
        return view('auth.login', $data);
    }


    function logout(Request $request)
    {
        if ($request->user()->hasRole('management')) {

            $user = User::whereId(Auth::id())->first();
            $user->islogin = 0;
            $user->save();

            Auth::logout();

            return redirect('loginmanagement');
        } elseif ($request->user()->hasRole('partner')) {

            $user = User::whereId(Auth::id())->first();
            $user->islogin = 0;
            $user->save();

            Auth::logout();

            return redirect('loginpartner');
        } elseif ($request->user()->hasRole('telemarketing')) {

            $tele = DB::table('mst_telemarketing')->where('id', Auth::id())->first();
            $tele->islogin = 0;
            $tele->save();

            $user = User::whereId(Auth::id())->first();
            $user->islogin = 0;
            $user->save();

            Auth::logout();

            return redirect('logintele');
        } elseif ($request->user()->hasRole('report')) {

            $user = User::whereId(Auth::id())->first();
            $user->islogin = 0;
            $user->save();

            Auth::logout();

            return redirect('loginreport');
        }
    }
}
