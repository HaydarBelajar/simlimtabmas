<?php

namespace App\Http\Controllers\Admin\Pengabdian;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;

class PengabdianController extends Controller
{
    private $controllerDetails;
    private $controllerPengabdianDetails;
    private $controllerReviewer;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Usulan Baru",
            "pageDescription" => "Halaman Usulan Baru pengabdian"
        ];

        $this->controllerPengabdianDetail = [
            "currentPage" => "Detail Pengabdian",
            "pageDescription" => "Halaman Detail Pengabdian"
        ];

        $this->controllerPengabdianEdit = [
            "currentPage" => "Edit Pengabdian",
            "pageDescription" => "Halaman Edit Pengabdian"
        ];

        $this->controllerReviewer = [
            "currentPage" => "Reviewer",
            "pageDescription" => "Halaman Daftar Reviewer"
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
    public function dataPengabdian(Request $request)
    {
        $param = [
            'name' => 'batas pengajuan',
        ];

        $getData = $this->postAPI($param, 'setting/get-filter');

        return view('admin.content.pengabdian.usulan-baru.daftar-usulan-baru')->with([
            'detailController' => $this->controllerDetails,
            'setting' => $getData['data'][0] ?? [],
        ]);
    }

    public function detailPengabdian($id, Request $request)
    {
        $param = [
            'usulan_id' => $id,
        ];

        $getData = $this->postAPI($param, 'pengabdian/get-pengabdian');

        $detailPengabdian = $getData['data'];

        return view('admin.content.pengabdian.usulan-baru.detail-usulan-baru')->with([
            'detailController' => $this->controllerPengabdianDetail,
            'detailPengabdian' => $detailPengabdian,
        ]);
    }

    public function destroy($id)
    {
        $param = [
            'usulan_id' => $id
        ];

        $getData = $this->postAPI($param, 'pengabdian/delete');
        return $getData;
    }

    public function tambahDataPengabdian()
    {
        $paramSkema = [
            "filter" => [
                "skema_tipe" => "pengabdian"
            ]
        ];
        $paramPengusul = [
            "filter" => [
                "role" => ["Dosen Pengusul", "Mahasiswa"]
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
        $getProdi = $this->postAPI([], 'program-studi/get-cascader');

        return view('admin.content.pengabdian.usulan-baru.pengajuan-usulan-baru')->with([
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
            'listProdi' => isset($getProdi['data']) ? $getProdi['data'] : [],
        ]);
    }

    public function editDataPengabdian($id)
    {
        $paramPengabdian = [
            'usulan_id' => $id,
        ];

        $paramSkema = [
            "filter" => [
                "skema_tipe" => "pengabdian"
            ]
        ];
        $paramPengusul = [
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
        $getData = $this->postAPI($paramPengabdian, 'pengabdian/get-pengabdian');
        if (isset($getData['status_code']) && $getData['status_code'] == 500) {
            abort(500);
        }

        $getFakultas = $this->postAPI([], 'fakultas/get-cascader');
        $getProdi = $this->postAPI([], 'program-studi/get-cascader');
        $detailPengabdian = isset($getData['data']) ? $getData['data'] : [];

        return view('admin.content.pengabdian.usulan-baru.pengajuan-usulan-baru')->with([
            'page' => 'edit',
            'detailController' => $this->controllerPengabdianEdit,
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listSkema' => isset($getSkema['data']) ? $getSkema['data'] : [],
            'listRumpunIlmu' => isset($getRumpunIlmu['data']) ? $getRumpunIlmu['data'] : [],
            'listSumberDana' => isset($getSumberDana['data']) ? $getSumberDana['data'] : [],
            'listUserPengusul' => isset($getUserPengusul['data']) ? $getUserPengusul['data'] : [],
            'listCapaianLuaran' => isset($getCapaianLuaran['data']) ? $getCapaianLuaran['data'] : [],
            'listPeranan' => isset($getPeranan['data']) ? $getPeranan['data'] : [],
            'detailPengabdian' => $detailPengabdian,
            'listProdi' => isset($getProdi['data']) ? $getProdi['data'] : [],
            'listFakultas' => isset($getFakultas['data']) ? $getFakultas['data'] : [],
        ]);
    }

    public function simpanDataPengabdian(Request $request)
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
            'list_anggota_pengabdian' => $request->listanggotapengabdian,
            'fakultas_id' => $request->fakultas_id,
            'ps_id' => $request->program_studi,
            'person_id' => $userDetail['id'],
            'status' => 0,
            'jenis_usulan' => $request->jenis_usulan
        ];

        $simpanData = $this->postAPI($param, 'pengabdian/create-pengabdian');

        if (isset($simpanData['success'])) {
            return redirect()->route('pengabdian.data-pengabdian')->with('message', $simpanData['success']);
        } else {
            return redirect()->route('pengabdian.data-pengabdian')->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
    }

    public function updateDataPengabdian(Request $request)
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
            'list_anggota_pengabdian' => $request->listanggotapengabdian,
            'fakultas_id' => $request->fakultas_id,
            'ps_id' => $request->program_studi,
            'person_id' => $userDetail['id'],
            'status' => 0,
            'jenis_usulan' => $request->jenis_usulan
        ];

        $simpanData = $this->postAPI($param, 'pengabdian/update-pengabdian');
        if (isset($simpanData['success'])) {
            return redirect()->route('pengabdian.data-pengabdian')->with('message', $simpanData['success']);
        } else {
            return redirect()->route('pengabdian.data-pengabdian')->with('error', $simpanData['error'] ?? $simpanData['reason']);
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
            'jenis_usulan' => 2
        ];

        $getData = $this->postAPI($dataTablesParam, 'pengabdian/get-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<div class="btn-group">';
                if (in_array('edit pengabdian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '<a target="_blank" type="button" href="/pengabdian/edit-pengabdian/' . $data['usulan_id'] . '" name="edit" id="' . $data['usulan_id'] . '" class="edit btn btn-primary btn-sm">Edit</a>';
                }
                if (in_array('delete pengabdian', Session::get('kucingku')['user']['permission_array'])) {
                    $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['usulan_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
                }
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="/pengabdian/detail-pengabdian/' . $data['usulan_id'] . '" name="catatan_harian" id="' . $data['usulan_id'] . '" class="secondary btn btn-secondary btn-sm" >Detail</a>';
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
        $getData = $this->postAPI($dataTablesParam, 'pengabdian/get-catatan-harian-filter');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                // $button = '<button type="button" name="edit" id="' . $data['catatan_pengabdian_id'] . '" class="edit btn btn-primary btn-sm">Edit</button>';
                $button = '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['catatan_pengabdian_id'] . '" class="delete btn btn-danger btn-sm" >Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }

    public function hapusCatatanHarian($id, Request $request)
    {
        $param = [
            'catatan_pengabdian_id' => $id,
        ];

        $deleteData = $this->postAPI($param, 'pengabdian/delete-catatan-harian');

        if (isset($deleteData['success'])) {
            return response()->json(['success' => $deleteData['success']]);
        } else {
            return response()->json(['errors' => 'Data Gagal Dihapus !']);
        }
    }

    public function updateStatusPengabdian($id, Request $request)
    {
        $param = [
            'usulan_id' => $id,
            'user_menyetujui_id' => $request->user_menyetujui_id,
            'status' => $request->status,
        ];

        $update = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
        $fileName = $request->username_ketua_usulan.'_'.time() . '.' . $file->extension();
        $file->move(public_path('media/proposal'), $fileName);
        if (!$file) {
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_proposal' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_laporan_akhir' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_laporan_70' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_kepuasan_mitra' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
        $fileName = $request->username_ketua_usulan.'_'.time() . '.' . $file->extension();
        $file->move(public_path('media/proposal-revisi'), $fileName);
        if (!$file) {
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_proposal_revisi' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

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
            return redirect()->route('pengabdian.detail-pengabdian')->with('error', 'Gagal Menyimpan File');
        }
        $param = [
            'usulan_id' => $request->id_pengabdian,
            'tanggal_pelaksanaan' => Carbon::parse($request->tanggal_pelaksanaan, 'Asia/Jakarta')->format('Y-m-d'),
            'deskripsi' => $request->deskripsi,
            'berkas' => $fileName,
        ];

        $simpanData = $this->postAPI($param, 'pengabdian/create-catatan-harian-pengabdian');

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
            return redirect()->route('pengabdian.data-pengabdian')->with('error', 'Gagal Menyimpan File');
        }

        $param = [
            'usulan_id' => $request->id_pengabdian,
            'file_upload_pengesahan' => $fileName,
        ];

        $updateData = $this->postAPI($param, 'pengabdian/update-pengabdian');

        if (isset($updateData['success'])) {
            return redirect()->route('pengabdian.data-pengabdian')->with('message', $updateData['success']);
        } else {
            return redirect()->route('pengabdian.data-pengabdian')->with('error', $updateData['error'] ?? $updateData['reason']);
        }

        return response()->json(['success' => $fileName]);
    }

    public function reviewer(Request $request)
    {

        return view('admin.content.pengabdian.reviewer.reviewer')->with([
            'detailController' => $this->controllerReviewer,
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
                $button = '<a target="_blank" type="button" href="/pengabdian/reviewer-detail/' . $data['id'] . '" name="detail" id="' . $data['id'] . '" class="detail btn btn-primary btn-sm">Detail</a>';
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

        return view('admin.content.pengabdian.reviewer.detail-reviewer')->with([
            'detailController' => $this->controllerReviewer,
            'reviewerData' => isset($getData['data']) ? $getData['data'] : []
        ]);
    }

    public function getPengabdianByReviewerDatatables($userId, Request $request)
    {
        $userSession = $request->session()->get('kucingku');
        $userDetail = $userSession['user'];

        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $dataTablesParam['filter'] = ['user_id' => $userId];

        $getData = $this->postAPI($dataTablesParam, 'pengabdian/get-pengabdian-by-reviewer');

        $data = $getData['data'];
        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<a target="_blank" type="button" href="/pengabdian/delete-reviewer-pengabdian/' . $data['usulan_id'] . '" name="delete" id="' . $data['usulan_id'] . '" class="detail btn btn-danger btn-sm">Hapus</a>';
                return $button;
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

        return view('admin.content.pengabdian.reviewer.penugasan-reviewer')->with([
            'detailController' => $this->controllerTambahUsulanReviewer,
            'page' => 'tambah',
            'listTahun' => isset($getTahun['data']) ? $getTahun['data'] : [],
            'listFakultas' => isset($getFakultas['data']) ? $getFakultas['data'] : [],
            'reviewerDetail' => isset($getReviewerDetail['data']) ? $getReviewerDetail['data'] : []
        ]);
    }

    public function getPengabdianCascader($tahunUsulan, $tahunPelaksanaan, $fakultas)
    {
        $param = [
            'filter' => [
                'tahun_usulan_id' => $tahunUsulan,
                'tahun_pelaksanaan_id' => $tahunPelaksanaan,
                'fakultas_id' => $fakultas,
                'is'
            ]
        ];

        $getPengabdianData = $this->postAPI($param, 'pengabdian/get-filter');

        if (isset($getPengabdianData['data'])) {
            return response()->json(['data' => $getPengabdianData['data'], 'success' => 'success']);
        }

        return response()->json(['errors' => 'gagal mendapatkan data']);
    }

    public function createPenugasanReviewer(Request $request)
    {
        $daftarMapping = [];
        if (count($request['daftar_pengabdian']) > 0) {
            foreach ($request['daftar_pengabdian'] as $data) {
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

        if (isset($simpanData['success'])) {
            return redirect()->route('pengabdian.reviewer-detail', $request->reviewer_id)->with('message', $simpanData['success']);
        } else {
            return redirect()->route('pengabdian.reviewer-detail', $request->reviewer_id)->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
    }
}
