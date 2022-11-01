<?php

namespace App\Http\Controllers\Admin\Penelitian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;

class PenelitianController extends Controller
{
    private $controllerDetails;
    private $controllerPenelitianDetails;
    private $controllerReviewerPenelitian;
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

        $this->controllerReviewerPenelitian = [
            "currentPage" => "Reviewer",
            "pageDescription" => "Halaman Daftar Reviewer Penelitian"
        ];

        $this->controllerTambahUsulanReviewer = [
            "currentPage" => "Reviewer",
            "pageDescription" => "Halaman Tambah Usulan Reviewer"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dataPenelitian(Request $request)
    {
        $param = [
            'name' => 'batas pengajuan',
        ];

        $getData = $this->postAPI($param, 'setting/get-filter');

        return view('admin.content.penelitian.usulan-baru.daftar-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
            'setting' => $getData['data'][0] ?? [],
        ]);
    }

    public function detailPenelitian($id, Request $request)
    {
        $param = [
            'usulan_id' => $id,
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
        $paramSkema = [
            "filter" => [
                "skema_tipe" => "penelitian"
            ]
        ];
        $paramPengusul = [
            "filter" => [
                "role" => "Pengusul"
            ]
        ];

        $getTahun = $this->postAPI([], 'tahun/get-all');
        $getSkema = $this->postAPI($paramSkema, 'skema/get-filter');
        $getRumpunIlmu = $this->postAPI([], 'rumpun-ilmu/get-filter');
        $getSumberDana = $this->postAPI([], 'sumber-dana/get-filter');
        $getUserPengusul = $this->postAPI([], 'user/get-filter');
        $getCapaianLuaran = $this->postAPI([], 'capaian-luaran/get-all');
        $getPeranan = $this->postAPI([], 'peranan/get-all');
        $getFakultas = $this->postAPI([], 'fakultas/get-cascader');

        return view('admin.content.penelitian.usulan-baru.pengajuan-usulan-baru')->with([
            'page' => 'tambah',
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
            'usulan_id' => $id,
        ];

        $paramSkema = [
            "filter" => [
                "skema_tipe" => "penelitian"
            ]
        ];
        $paramPengusul = [
            "filter" => [
                "skema_tipe" => "Pengusul"
            ]
        ];
        $getData = $this->postAPI($paramPenelitian, 'penelitian/get-penelitian');
        if (isset($getData['status_code']) && $getData['status_code'] == 500) {
            abort(500);
        }

        $getTahun = $this->postAPI([], 'tahun/get-all');
        $getSkema = $this->postAPI($paramSkema, 'skema/get-filter');
        $getRumpunIlmu = $this->postAPI([], 'rumpun-ilmu/get-filter');
        $getSumberDana = $this->postAPI([], 'sumber-dana/get-filter');
        $getUserPengusul = $this->postAPI($paramPengusul, 'user/get-filter');
        $getCapaianLuaran = $this->postAPI([], 'capaian-luaran/get-all');
        $getPeranan = $this->postAPI([], 'peranan/get-all');

        $getFakultas = $this->postAPI([], 'fakultas/get-cascader');
        $detailPenelitian = isset($getData['data']) ? $getData['data'] : [];
        $wewenangUsulan = isset($getData['data']['wewenang_usulan']) ? $getData['data']['wewenang_usulan'] : [];
        $anggotaPenelitian = [];
        $anggotaPenelitianIds = [];
        $indexKetua = array_search('1', array_column($wewenangUsulan, 'wewenang'));
        $indexAnggota1 = array_search('2', array_column($wewenangUsulan, 'wewenang'));
        $indexAnggota2 = array_search('3', array_column($wewenangUsulan, 'wewenang'));
        $indexAnggota3 = array_search('4', array_column($wewenangUsulan, 'wewenang'));
        // dd($getData, $indexKetua, $indexAnggota1, $indexAnggota2, $indexAnggota3);
        // Membentuk array anggota
        if ($indexKetua !== FALSE) {
            array_push($anggotaPenelitian, [$wewenangUsulan[$indexKetua]['detail_pengusul']['name'], 'Ketua Peneliti', $wewenangUsulan[$indexKetua]['detail_fakultas']['namafakultas'], '<a type="button" data-index=1 class="delete-anggota-penelitian btn btn-danger" style="color:white">Hapus</a>', $wewenangUsulan[$indexKetua]['user_id'], 1, $wewenangUsulan[$indexKetua]['fakultas_id']]);
            array_push($anggotaPenelitianIds, [
                "userId" => $wewenangUsulan[$indexKetua]['user_id'],
                "perananId" => 1,
                "fakultasId" =>  $wewenangUsulan[$indexKetua]['fakultas_id']
            ]);
        }

        if ($indexAnggota1 !== FALSE) {
            array_push($anggotaPenelitian, [$wewenangUsulan[$indexAnggota1]['detail_pengusul']['name'], 'Anggota Peneliti 1', $wewenangUsulan[$indexAnggota1]['detail_fakultas']['namafakultas'], '<a type="button" data-index=1 class="delete-anggota-penelitian btn btn-danger" style="color:white">Hapus</a>', $wewenangUsulan[$indexAnggota1]['user_id'], 2, $wewenangUsulan[$indexAnggota1]['fakultas_id']]);
            array_push($anggotaPenelitianIds, [
                "userId" => $wewenangUsulan[$indexAnggota1]['user_id'],
                "perananId" => 2,
                "fakultasId" =>  $wewenangUsulan[$indexAnggota1]['fakultas_id']
            ]);
        }
        if ($indexAnggota2 !== FALSE) {
            array_push($anggotaPenelitian, [$wewenangUsulan[$indexAnggota2]['detail_pengusul']['name'], 'Anggota Peneliti 2', $wewenangUsulan[$indexAnggota2]['detail_fakultas']['namafakultas'], '<a type="button" data-index=1 class="delete-anggota-penelitian btn btn-danger" style="color:white">Hapus</a>', $wewenangUsulan[$indexAnggota2]['user_id'], 3, $wewenangUsulan[$indexAnggota2]['fakultas_id']]);
            array_push($anggotaPenelitianIds, [
                "userId" => $wewenangUsulan[$indexAnggota2]['user_id'],
                "perananId" => 3,
                "fakultasId" =>  $wewenangUsulan[$indexAnggota2]['fakultas_id']
            ]);
        }
        if ($indexAnggota3 !== FALSE) {
            array_push($anggotaPenelitian, [$wewenangUsulan[$indexAnggota3]['detail_pengusul']['name'], 'Anggota Peneliti 3', $wewenangUsulan[$indexAnggota3]['detail_fakultas']['namafakultas'], '<a type="button" data-index=1 class="delete-anggota-penelitian btn btn-danger" style="color:white">Hapus</a>', $wewenangUsulan[$indexAnggota3]['user_id'], 4, $wewenangUsulan[$indexAnggota3]['fakultas_id']]);
            array_push($anggotaPenelitianIds, [
                "userId" => $wewenangUsulan[$indexAnggota3]['user_id'],
                "perananId" => 4,
                "fakultasId" =>  $wewenangUsulan[$indexAnggota3]['fakultas_id']
            ]);
        }
        Log::debug($detailPenelitian);
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
            'detailPenelitian' => $detailPenelitian,
            'listFakultas' => isset($getFakultas['data']) ? $getFakultas['data'] : [],
            'anggotaPenelitian' => $anggotaPenelitian,
            'anggotaPenelitianIds' => $anggotaPenelitianIds,
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
            'fakultas_id' => $request->fakultas_id,
            'person_id' => $userDetail['id'],
            'status' => 0,
            'jenis_usulan' => $request->jenis_usulan
        ];

        $simpanData = $this->postAPI($param, 'penelitian/create-penelitian');

        if (isset($simpanData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message', $simpanData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
    }

    public function updateDataPenelitian(Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        $param = [
            'usulan_id' => $request->usulan_id,
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
            'fakultas_id' => $request->fakultas_id,
            'person_id' => $userDetail['id'],
            'status' => 0,
            'jenis_usulan' => $request->jenis_usulan
        ];

        $simpanData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($simpanData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message', $simpanData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
    }

    public function getAll(Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = [
            'user_id' => $userDetail['id'],
            'jenis_usulan' => 1
        ];
        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<div class="btn-group">';
                if (in_array('edit penelitian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '<a target="_blank" type="button" href="/penelitian/edit-penelitian/' . $data['usulan_id'] . '" name="edit" id="' . $data['usulan_id'] . '" class="edit btn btn-primary btn-sm">Edit</a>';
                }
                if (in_array('delete penelitian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['usulan_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
                }
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="/penelitian/detail-penelitian/' . $data['usulan_id'] . '" name="catatan_harian" id="' . $data['usulan_id'] . '" class="secondary btn btn-secondary btn-sm" >Detail</a>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }

    public function getCatatanHarian(Request $request, $id)
    {

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['usulan_id' => $id];
        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-catatan-harian-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<div class="btn-group">';
                // $button = '<button type="button" name="edit" id="' . $data['catatan_id'] . '" class="edit btn btn-primary btn-sm">Edit</button>';
                $button = '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['catatan_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
                $button .= '</div>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }

    public function hapusCatatanHarian($id, Request $request)
    {
        $param = [
            'catatan_id' => $id,
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
            'usulan_id' => $id,
            'user_menyetujui_id' => $request->user_menyetujui_id,
            'status' => $request->status,
        ];

        $update = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($update['success'])) {
            return response()->json(['success' => $update['success']]);
        } else {
            return response()->json(['errors' => $update['reason']]);
        }
    }

    public function uploadPengesahan(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/pengesahan'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadProposal(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/proposal'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_proposal' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadLaporanAkhir(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/laporan-akhir'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_laporan_akhir' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadLaporan70(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/laporan-70'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_laporan_70' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadKepuasanMitra(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/kepuasan-mitra'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_kepuasan_mitra' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function uploadProposalRevisi(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/proposal-revisi'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_proposal_revisi' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return Redirect::back()->with('message', $updateData['success']);
        } else {
            return Redirect::back()->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function tambahCatatanHarian(Request $request)
    {
        $file = $request->file('fileToUpload');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/catatanHarian'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.detail-penelitian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_penelitian,
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
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('media/catatanHarian'), $fileName);
        if (!$file) {
            return redirect()->route('penelitian.data-penelitian')->with('error', 'Gagal Menyimpan File');
        }

        $param = [
            'usulan_id' => $request->id_penelitian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'penelitian/update-penelitian');

        if (isset($updateData['success'])) {
            return redirect()->route('penelitian.data-penelitian')->with('message', $updateData['success']);
        } else {
            return redirect()->route('penelitian.data-penelitian')->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function reviewer(Request $request)
    {

        return view('admin.content.penelitian.reviewer.reviewer')->with([
            'detailController' => $this->controllerReviewerPenelitian,
        ]);
    }

    public function getUserReviewerFilterDatatables(Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['role' => 'Reviewer'];

        $getData = $this->postAPI($dataTablesParam, 'user/get-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '';
                if (in_array('edit reviewer pengabdian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '<a target="_blank" type="button" href="/penelitian/reviewer-detail/' . $data['id'] . '" name="detail" id="' . $data['id'] . '" class="detail btn btn-primary btn-sm">Detail</a>';
                }
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }

    public function reviewerDetail($id)
    {
        $param = [
            'user_id' => $id
        ];
        $getData = $this->postAPI($param, 'user/get-user');

        return view('admin.content.penelitian.reviewer.detail-reviewer')->with([
            'detailController' => $this->controllerReviewerPenelitian,
            'reviewerData' => isset($getData['data']) ? $getData['data'] : []
        ]);
    }

    public function getPenelitianByReviewerDatatables($userId, Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['user_id' => $userId];

        $getData = $this->postAPI($dataTablesParam, 'penelitian/get-penelitian-by-reviewer');

        $data = $getData['data'];
        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '';
                if (in_array('delete reviewer pengabdian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '<a target="_blank" type="button" href="/penelitian/delete-reviewer-penelitian/' . $data['usulan_id'] . '" name="delete" id="' . $data['usulan_id'] . '" class="detail btn btn-danger btn-sm">Hapus</a>';
                    return $button;
                }
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }

    public function penugasanReviewer($id)
    {
        $param = [
            'user_id' => $id
        ];
        $getReviewerDetail = $this->postAPI($param, 'user/get-user');
        $getTahun = $this->postAPI([], 'tahun/get-all');
        $getFakultas = $this->postAPI([], 'fakultas/get-cascader');

        return view('admin.content.penelitian.reviewer.penugasan-reviewer')->with([
            'detailController' => $this->controllerTambahUsulanReviewer,
            'page' => 'tambah',
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listFakultas' => isset($getFakultas['data']) ? $getFakultas['data'] : [],
            'reviewerDetail' => isset($getReviewerDetail['data']) ? $getReviewerDetail['data'] : []
        ]);
    }

    public function getPenelitianCascader($tahunUsulan, $tahunPelaksanaan, $fakultas)
    {
        $param = [
            'filter' => [
                'tahun_usulan_id' => $tahunUsulan,
                'tahun_pelaksanaan_id' => $tahunPelaksanaan,
                'fakultas_id' => $fakultas,
                'is'
            ]
        ];

        $getPenelitianData = $this->postAPI($param, 'penelitian/get-filter');

        if (isset($getPenelitianData['data'])) {
            return response()->json(['data' => $getPenelitianData['data'], 'success' => 'success']);
        }

        return response()->json(['errors' => 'gagal mendapatkan data']);
    }

    public function createPenugasanReviewer(Request $request)
    {
        $daftarMapping = [];
        if (count($request['daftar_penelitian']) > 0) {
            foreach ($request['daftar_penelitian'] as $data) {
                array_push($daftarMapping, [
                    'user_id' => $request->reviewer_id,
                    'usulan_id' => $data,
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'Gagal Menyimpan Data');
        }
        $param['multiple_data'] = $daftarMapping;

        $simpanData = $this->postAPI($param, 'reviewer/create-reviewer');
        Log::debug($simpanData);
        if (isset($simpanData['success'])) {
            return redirect()->route('penelitian.reviewer-detail', $request->reviewer_id)->with('message', $simpanData['success']);
        } else {
            return redirect()->route('penelitian.reviewer-detail', $request->reviewer_id)->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
    }
}
