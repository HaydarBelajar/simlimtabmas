<?php

namespace App\Http\Controllers\Admin\Penelitian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

class PenelitianController extends Controller
{
    private $controllerDetails;
    private $controllerPenelitianDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Usulan Baru",
            "pageDescription" => "Halaman Usulan Baru penelitian"
        ];

        $this->controllerPenelitianDetail = [
            "currentPage" => "Detail Penelitian",
            "pageDescription" => "Halaman Detail Penelitian"
        ];

        $this->controllerPenelitianEdit = [
            "currentPage" => "Edit Penelitian",
            "pageDescription" => "Halaman Edit Penelitian"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPenelitian(Request $request)
    {
        return view('admin.content.penelitian.usulan-baru.daftar-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function detailPenelitian($id, Request $request)
    {
        $param = [
            'usulan_penelitian_id' => $id,
        ];

        $getData = $this->postAPI($param, 'penelitian/get-penelitian');

        $detailPenelitian = $getData['data'];

        return view('admin.content.penelitian.usulan-baru.detail-usulan-baru')->with([
            'detailController' => $this->controllerPenelitianDetail,
            'detailPenelitian' => $detailPenelitian,
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
        $getFakultas = $this->postAPI([], 'fakultas/get-cascader');

        return view('admin.content.penelitian.usulan-baru.pengajuan-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listSkema' => isset($getSkema['data']) ? $getSkema['data'] : [],
            'listRumpunIlmu' => isset($getRumpunIlmu['data']) ? $getRumpunIlmu['data'] : [],
            'listSumberDana' => isset($getSumberDana['data']) ? $getSumberDana['data'] : [],
            'listUserPengusul' => isset($getUserPengusul['data']) ? $getUserPengusul['data'] : [],
            'listCapaianLuaran' => isset($getCapaianLuaran['data']) ? $getCapaianLuaran['data'] : [],
            'listPeranan' => isset($getPeranan['data']) ? $getPeranan['data'] : [],
            'listFakultas' => isset($getFakultas['data']) ? $getFakultas['data'] : [],
        ]);
    }

    public function editDataPenelitian($id)
    {
        $paramPenelitian = [
            'usulan_penelitian_id' => $id,
        ];

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
        $getData = $this->postAPI($paramPenelitian, 'penelitian/get-penelitian');
        $detailPenelitian = $getData['data'];

        return view('admin.content.penelitian.usulan-baru.pengajuan-usulan-baru')->with([
            'page' => 'edit',
            'detailController' => $this->controllerPenelitianEdit,
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listSkema' => isset($getSkema['data']) ? $getSkema['data'] : [],
            'listRumpunIlmu' => isset($getRumpunIlmu['data']) ? $getRumpunIlmu['data'] : [],
            'listSumberDana' => isset($getSumberDana['data']) ? $getSumberDana['data'] : [],
            'listUserPengusul' => isset($getUserPengusul['data']) ? $getUserPengusul['data'] : [],
            'listCapaianLuaran' => isset($getCapaianLuaran['data']) ? $getCapaianLuaran['data'] : [],
            'listPeranan' => isset($getPeranan['data']) ? $getPeranan['data'] : [],
            'detailPenelitian' => isset($getData['data']) ? $getData['data'] : [],
        ]);
    }

    public function simpanDataPenelitian(Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

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
            'person_id' => $userDetail['id'],
            'status' => 0
        ];

        $simpanData = $this->postAPI($param, 'penelitian/create-penelitian');

        if (isset($simpanData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message',$simpanData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error',$simpanData['error'] ?? $simpanData['reason']);
        }
    }

    public function getAll(Request $request) {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['user_id' => $userDetail['id']];
        
        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-filter');

        $data = $getData['data'];
        
        $dataTables =  DataTables::of($data)
        ->addColumn('action', function ($data) {
            $button = '<a type="button" href="/penelitian/edit-penelitian/'.$data['usulan_penelitian_id'] .'" name="edit" id="' . $data['usulan_penelitian_id'] . '" class="edit btn btn-primary btn-sm">Edit</a>';
            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['usulan_penelitian_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
            $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="/penelitian/detail-penelitian/'.$data['usulan_penelitian_id'] . '" name="catatan_harian" id="' . $data['usulan_penelitian_id'] . '" class="secondary btn btn-secondary btn-sm" >Detail</a>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $dataTables;
    }

    public function getCatatanHarian(Request $request, $id) {

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['usulan_penelitian_id' => $id];
        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-catatan-harian-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
        ->addColumn('action', function ($data) {
            // $button = '<button type="button" name="edit" id="' . $data['catatan_penelitian_id'] . '" class="edit btn btn-primary btn-sm">Edit</button>';
            $button = '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['catatan_penelitian_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $dataTables;
    }

    public function hapusCatatanHarian($id, Request $request)
    {
        $param = [
            'catatan_penelitian_id' => $id,
        ];

        $deleteData = $this->postAPI($param, 'penelitian/delete-catatan-harian');
        
        if (isset($deleteData['success'])) {
            return response()->json(['success' => $deleteData['success']]);
        } else {
            return response()->json(['errors' => 'Data Gagal Dihapus !']);
        }
    }

    public function updateStatusPenelitian($id, Request $request)
    {
        $param = [
            'usulan_penelitian_id' => $id,
            'user_menyetujui_id' => $request->user_menyetujui_id,
            'status' => $request->status,
        ];

        $update = $this->postAPI($param, 'penelitian/update-penelitian');
        
        if (isset($update['success'])) {
            return response()->json(['success' => $update['success']]);
        } else {
            return response()->json(['errors' => 'Penelitian gagal diupdate !']);
        }
    }

    public function uploadPengesahan(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('media/pengesahan'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error','Gagal Menyimpan File');
        }
        $param = [
            'usulan_penelitian_id' => $request->id_penelitian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message',$updateData['success']);
        } else {
            return Redirect::back()->with('error',$updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadProposal(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('media/proposal'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error','Gagal Menyimpan File');
        }
        $param = [
            'usulan_penelitian_id' => $request->id_penelitian,
            'file_upload_proposal' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message',$updateData['success']);
        } else {
            return Redirect::back()->with('error',$updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadLaporanAkhir(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('media/laporan-akhir'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error','Gagal Menyimpan File');
        }
        $param = [
            'usulan_penelitian_id' => $request->id_penelitian,
            'file_upload_laporan_akhir' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message',$updateData['success']);
        } else {
            return Redirect::back()->with('error',$updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function tambahCatatanHarian(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('media/catatanHarian'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.detail-penelitian')->with('error','Gagal Menyimpan File');
        }
        $param = [
            'usulan_penelitian_id' => $request->id_penelitian,
            'tanggal_pelaksanaan' => Carbon::parse($request->tanggal_pelaksanaan, 'Asia/Jakarta')->format('Y-m-d'),
            'deskripsi' => $request->deskripsi,
            'berkas' => $fileName,
        ];

        $simpanData = $this->postAPI($param, 'penelitian/create-catatan-harian-penelitian');

        if (isset($simpanData['success'])) {
            return response()->json(['success' => 'Data berhasil ditambahkan']);
        } else {
            return response()->json(['errors' => 'Fail to update data']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function editCatatanHarian(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time().'.'.$file->extension();
        $file->move(public_path('media/catatanHarian'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error','Gagal Menyimpan File');
        }

        $param = [
            'usulan_penelitian_id' => $request->id_penelitian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message',$updateData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error',$updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }
}
