<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use AuthTraits;
    private $session;

    public function __construct()
    {
        $this->session = session('kucingku');

    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $param = [
            'filter' => [
                'user_id' => $this->session['user']['id'],
            ]
        ];

        $getDataPenelitian = $this->postAPI($param, 'penelitian/get-filter');

        $dataPenelitian = isset($getDataPenelitian['data']) ? $getDataPenelitian['data'] : [];
        return view('admin.content.home')->with([
            'dataPenelitian' => $dataPenelitian,
            'dataMappingDosen' => $this->session['user']['detail_dosen']  ,
        ]);

    }
}
