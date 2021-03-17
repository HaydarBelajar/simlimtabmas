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

        $error = json_decode($doAuth, true);
        if (isset($error['error'])){
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }

        return redirect()->intended('dashboard/home');
    }
}
