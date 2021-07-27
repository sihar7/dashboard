<?php

namespace App\Http\Controllers\Auth;

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

class LoginController extends Controller
{
    function postLogin(Request $request)
    {
        Log::info('Proses login dengan username : '.$request->username);

        DB::beginTransaction();

        $username = $request->username;
        $password = $request->password;

        $validate = Validator::make($request->all(), [
            'g-recaptcha-response' => 'required|captcha'
        ]);

        if ($validate->fails()) {
            return response()->json([' message' => 5], 201);
        }
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        try {
            if (Auth::attempt( [ 'username' => $username, 'password' => $password ], $remember_me ) ) {
                $cek_online = User::cekUsername($username);
                $status = $cek_online->status;

                if( $status == '0' || $status == null ) {
                    if ( $request->user()->hasRole('management') ) {
                        $user = User::cekUsername($username);
                        $user->last_login_at  = Carbon::now()->toDateTimeString();
                        $user->last_login_ip  = $request->ip();
                        $user->status         = '1';
                        $user->remember_token = 'TOKEN-AUTH-'.str_replace('/', '',  Hash::make(Str::random(20)));
                        $user->save();

                        Log::info('Berhasil Login Dengan Role Management dan Username : '.$request->username . ' ' . 'Token' . ' ' . $user->remember_token);

                        return response()->json(['message' => 1 ], 201);
                    } elseif( $request->user()->hasRole('partner') ) {
                        $user = User::cekUsername($username);
                        $user->last_login_at = Carbon::now()->toDateTimeString();
                        $user->last_login_ip = $request->ip();
                        $user->status        = '1';
                        $user->remember_token = 'TOKEN-AUTH-'.str_replace('/', '',  Hash::make(Str::random(20)));
                        $user->save();

                        Log::info('Berhasil Login Dengan Role Partner dan Username : '.$request->username . ' '  . 'Token' . ' ' . $user->remember_token);

                        return response()->json(['message' => 2 ], 201);
                    }
                } else {
                    Log::info('User Already Login : '.$request->username);
                    return response()->json( [ 'status' => 6, 'message' => 'User Already Login !' ], 203 );
                }
            } else {
                Log::info('Gagal Login : '.$request->username);
                return response()->json( [ 'status' => 3, 'message' => 'username atau Password Salah !' ], 203 );
            }

          } catch (\Exception $e) {
                DB::rollback();
              return response()->json([ 'error' => $e->getMessage() ]);
          }

        DB::commit();

    }

    function loginManagement()
    {
        $data['judul'] = 'Login Management';
        $data['nama'] = 'Management';
        Session::put('url.intended',URL::previous());
        return view('auth.login', $data);
    }

    function loginPartner()
    {
        $data['judul'] = 'Login Partner';
        $data['nama'] = 'Partner';

        Session::put('url.intended',URL::previous());
        return view('auth.login', $data);
    }

    function logout(Request $request)
    {
        if($request->user()->hasRole('management')) {
            $user = User::whereId(Auth::id())->first();
            $user->status = 0;
            $user->save();

            Auth::logout();
            return redirect('loginManagement');
        } else {
            $user = User::whereId(Auth::id())->first();
            $user->status = 0;
            $user->save();

            Auth::logout();
            return redirect('loginPartner');
        }
    }
}
