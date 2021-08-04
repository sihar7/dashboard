<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use App\Repository\TeleRepo;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{

    protected $tele;

    function __construct(TeleRepo $tele)
    {
        $this->tele = $tele;
        $this->middleware(['has_login']);
    }

    function index(Request $request)
    {
        if($request->user()->hasRole('management'))
        {
            if (Auth()->user()->api_token) {
                $data['getHistoryTele']     = $this->tele->getHistoryTele();
                $data['topTsr10']           = $this->tele->topTsr10();
                $data['getTeleReward']      = $this->tele->getTeleReward();

                return view('management.dashboard', $data);
                // return view('management.dashboard');
            } else {
                abort(404);
            }
        }
          else if($request->user()->hasRole('partner'))
        {
            if (Auth()->user()->api_token) {
                return view('partner.dashboard');
            } else {
                abort(404);
            }
        } else {
            abort(403);
        }
    }

}
