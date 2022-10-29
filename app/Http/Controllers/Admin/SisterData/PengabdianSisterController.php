<?php

namespace App\Http\Controllers\Admin\SisterData;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class PengabdianSisterController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Daftar Pengabdian Sister",
            "pageDescription" => "Halaman Daftar Pengabdian Sister"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.sister.pengabdian.daftar-pengabdian')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }
}
