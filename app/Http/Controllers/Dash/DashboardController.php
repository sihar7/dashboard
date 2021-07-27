<?php

namespace App\Http\Controllers\Dash;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Spaj;
use App\Repository\TeleRepo;

class DashboardController extends Controller
{

    protected $tele;

     function __construct(TeleRepo $tele)
     {
        $this->tele = $tele;
         
        $this->middleware(['has_login','SecureHeaders', 'XSS']);
    }

    function index(Request $request)
    {

        if($request->user()->hasRole('management'))
        {
           
            $data['tele'] = $this->tele->getHistoryTele();
            return view('management.dashboard', $data);
        }
          else if($request->user()->hasRole('partner'))
        {
            return view('partner.dashboard');
        } else {
            abort(403);
        }
    }

}
