<?php

namespace App\Http\Controllers\Admin\Penelitian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class CatatanHarianController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Catatan Harian Penelitian",
            "pageDescription" => "Halaman Catatan Harian Penelitian"
        ];
    }

    public function dataCatatanHarian()
    {
        return view('admin.content.penelitian.catatan-harian.daftar-catatan-harian')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function tambahDataCatatanHarian()
    {
        return view('admin.content.penelitian.catatan-harian.tambah-catatan-harian')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.penelitian.sptb.menu-sptb')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
