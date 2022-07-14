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

    public function logout(Request $request) {
        $request->session()->flush();

        return redirect()->route('login');

    }

    public function register(Request $request)
    {
        $param = [];
        $getRoles = $this->getPubAPI($param, 'roles/get-filter');

        return view('auth.register')->with([
            'rolesOptions' => isset($getRoles['data']) ? $getRoles['data'] : [],
        ]);
    }

    public function store(Request $request)
    {
        if ($request->password != $request->confirmpassword) {
            return json_encode(['error' => 'Gagal membuat user, harap periksa kembali password anda !']);
        }

        $param = [
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'confirmPassword' => $request->confirmpassword,
            'dosen_id' => $request->dosen_id,
            'isCivitasUnisa' => $request->civitasUnisa,
            'nidn' => $request->nidn,
            'nim' => $request->nim,
        ];

        $getRoles = $this->postAPI($param, 'user/create');
        return json_encode($getRoles);
    }

    public function storev2(Request $request)
    {
        if ($request->password != $request->confirmpassword) {
            return json_encode(['error' => 'Gagal membuat user, harap periksa kembali password anda !']);
        }
        
        $param = [
            'username' => $request->username,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'confirmPassword' => $request->confirmpassword,
            'dosen_id' => $request->dosen_id,
            'isCivitasUnisa' => $request->civitasUnisa,
            'nidn' => $request->nidn,
            'nim' => $request->nim,
        ];

        $userCreate = $this->postPubAPI($param, 'user/create');
        if (isset($userCreate['success'])) {
            return redirect()->route('login')->with('success', $userCreate['success']);
        }
        return back()->withErrors($userCreate['error'] ?? 'error')->withInput();
    }
}
