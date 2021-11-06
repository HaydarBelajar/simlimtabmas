<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use AuthTraits;
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        $param = [
            'userId' => $userDetail['id']
        ];

        $getDataPenelitian = $this->postAPI($param, 'penelitian/get-filter');
        $dataPenelitian = isset($getDataPenelitian['data']) ? $getDataPenelitian['data'] : [];
        return view('admin.content.home')->with([
            'dataPenelitian' => $dataPenelitian,
            'dataMappingDosen' => $userSession['dosenDetail']['detail_dosen'],
        ]);

    }
}
