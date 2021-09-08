<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
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
class AuthController extends Controller
{


    function refreshCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }

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
        Log::info('Proses login dengan username : '.$request->username);

        $username = $request->username;
        $password = $request->password;

        $validate = Validator::make($request->all(), [
            'captcha' => 'required|captcha'],
            ['captcha.captcha' => 'Invalid captcha code']
        );

        if ($validate->fails()) {
            return response()->json(['status' => 4], 201);
        }
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        try {
            if (Auth::attempt( [ 'username' => $username, 'password' => $password ]) ) {
                $cek_online = User::cekUsername($username);
                $islogin = $cek_online->islogin;
                if( $islogin == 0 || $islogin == null ) {
                $newtoken  = $this->generateRandomString();
                    if ( $request->user()->hasRole('admin') ) {
                        $user                 = User::cekUsername($username);
                        $user->last_login_at  = Carbon::now()->toDateTimeString();
                        $user->last_login_ip  = $request->ip();
                        $user->islogin        = 1;
                        $user->api_token      = 'TOKEN-ADMIN-'.$newtoken;
                        $user->save();

                        Auth::login($user, $remember_me);

                        Log::info('Berhasil Login Dengan Role Admin dan Username : '.$request->username . ' ' . 'Token' . ' ' . $user->api_token);

                        return response()->json(['status' => 1 ], 201);

                    } else {
                        return response()->json(['status' => 5], 201);
                    }
                } else {
                    Log::info('User Already Login : '.$request->username);
                    return response()->json( [ 'status' => 2, 'message' => 'User Already Login !' ], 203 );
                }
            } else {
                Log::info('Gagal Login : '.$request->username);
                return response()->json( [ 'status' => 3, 'message' => 'Username atau Password Salah !' ], 203 );
            }

          } catch (\Exception $e) {
              return response()->json([ 'error' => $e->getMessage() ]);
          }
    }
}
