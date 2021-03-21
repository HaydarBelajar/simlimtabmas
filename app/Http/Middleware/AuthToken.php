<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Route;

class AuthToken
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
        if (Session::has('kucingku')) {
            if (Route::currentRouteName() == 'login'){
                return redirect('dashboard/home');
            } else {
                return $next($request);
            }
        }
        return redirect('login');
    }
}
