<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTraits;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    use AuthTraits;

    public function index(Request $request)
    {
        return view('auth.login');
    }
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        
        $doAuth = $this->auth($credentials);

        if (isset($doAuth['status_code']) && $doAuth['status_code'] > 200){
            return back()->withErrors([
                'email' => $doAuth['reason'],
            ]);
        }
        
        return redirect()->intended('dashboard/home');
    }
}
