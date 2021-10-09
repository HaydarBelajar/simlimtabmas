<?php

namespace App\Http\Controllers\Admin\Penelitian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use DataTables;

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
        return view('admin.content.penelitian.usulan-baru.daftar-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function tambahDataPenelitian()
    {
        $paramSkema= [
            "filter" => [
                "skema_tipe" => "penelitian"
            ]
        ];
        $paramPengusul= [
            "filter" => [
                "skema_tipe" => "Pengusul"
            ]
        ];

        $getTahun = $this->postAPI([], 'tahun/get-all');
        $getSkema = $this->postAPI($paramSkema, 'skema/get-filter');
        $getRumpunIlmu = $this->postAPI([], 'rumpun-ilmu/get-filter');
        $getSumberDana = $this->postAPI([], 'sumber-dana/get-filter');
        $getUserPengusul = $this->postAPI($paramPengusul, 'user/get-filter');
        $getCapaianLuaran = $this->postAPI([], 'capaian-luaran/get-all');
        $getPeranan = $this->postAPI([], 'peranan/get-all');

        return view('admin.content.penelitian.usulan-baru.pengajuan-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listSkema' => isset($getSkema['data']) ? $getSkema['data'] : [],
            'listRumpunIlmu' => isset($getRumpunIlmu['data']) ? $getRumpunIlmu['data'] : [],
            'listSumberDana' => isset($getSumberDana['data']) ? $getSumberDana['data'] : [],
            'listUserPengusul' => isset($getUserPengusul['data']) ? $getUserPengusul['data'] : [],
            'listCapaianLuaran' => isset($getCapaianLuaran['data']) ? $getCapaianLuaran['data'] : [],
            'listPeranan' => isset($getPeranan['data']) ? $getPeranan['data'] : [],
        ]);
    }

    public function simpanDataPenelitian(Request $request)
    {
        $param = [
            'tahun_id' => $request->tahun_id,
            'tahun_pelaksanaan_id' => $request->tahun_pelaksanaan_id,
            'skema_id' => $request->skema_id,
            'durasi_kegiatan' => $request->durasi_kegiatan,
            'usulan_tahun_ke' => $request->usulan_tahun_ke,
            'judul' => $request->judul,
            'abstrak' => $request->abstrak,
            'keywords' => $request->keywords,
            'email' => $request->email,
            'rumpun_ilmu_id' => $request->rumpun_ilmu_id,
            'bidang_fokus' => $request->bidang_fokus,
            'sumber_dana_id' => $request->sumber_dana_id,
            'jumlah_usulan_dana' => $request->jumlah_sumber_dana,
            'user_mengetahui_id' => $request->mengetahui_penandatanganan_id,
            'jumlah_dana_mengetahui' => $request->jumlah_dana_penandatanganan,
            'jenis_luaran' => $request->jenis_luaran,
            'list_anggota_penelitian' => json_decode($request->list_anggota_penelitian),
        ];

        $simpanData = $this->postAPI($param, 'penelitian/create-penelitian');

        if (isset($simpanData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message',$simpanData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error',$simpanData['error'] ?? $simpanData['reason']);
        }
    }

    public function getAll(Request $request) {
        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-filter');

        $data = $getData['data'];

        for ($i=0; $i < count($data); $i++) { 
            # code...
            $data[$i]['status'] = 'Menunggu Konfirmasi';
        }

        $dataTables =  DataTables::of($data)
        ->addColumn('action', function ($data) {
            $button = '<button type="button" name="edit" id="' . $data['usulan_penelitian_id'] . '" class="edit btn btn-primary btn-sm">Edit</button>';
            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['usulan_penelitian_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $dataTables;
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

    public function uploadPengesahan($id)
    {
        return 'asdasd';
    }

    public function uploadProposal($id)
    {
        return 'asdasd';
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
