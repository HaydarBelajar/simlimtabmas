<?php

namespace App\Http\Controllers\Admin\Penelitian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class PenelitianController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Usulan Baru",
            "pageDescription" => "Halaman Usulan Baru penelitian"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPenelitian()
    {
        return view('admin.content.penelitian.usulan-baru.pengajuan-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function lanjutkanUsulan()
    {
        return view('admin.content.penelitian.usulan-baru.menu-lanjut-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function identitasUsulan()
    {
        return view('admin.content.penelitian.usulan-baru.menu-identitas-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function jurnalInternasional()
    {
        return view('admin.content.penelitian.usulan-baru.artikel-jurnal-internasional')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function jurnalNasional()
    {
        return view('admin.content.penelitian.usulan-baru.artikel-jurnal-nasional')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function artikelProsiding()
    {
        return view('admin.content.penelitian.usulan-baru.artikel-prosiding')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function kekayaanIntelektual()
    {
        return view('admin.content.penelitian.usulan-baru.kekayaan-intelektual')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function buku()
    {
        return view('admin.content.penelitian.usulan-baru.buku')->with([
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
