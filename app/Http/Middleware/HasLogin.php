<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty($request->user())) {
            if ($request->user()->hasRole('management')) {
                return $next($request);
            } elseif($request->user()->hasRole('partner')) {
                return $next($request);
            } else {
                abort(404);
            }
        } else {
            return redirect('/');
        }
    }
}
