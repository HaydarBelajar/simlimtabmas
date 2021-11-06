<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTraits;
use DataTables;
use Illuminate\Support\Facades\Log;

class UserManagementController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Manajemen Pengguna",
            "pageDescription" => "Halaman Manajemen Pengguna"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $param = [];
        $getRoles = $this->postAPI($param, 'role/get-all');
        $getDosenCascader = $this->postAPI($param, 'dosen/get-cascader');
        
        return view('admin.content.menu-user-list')->with([
            'detailController' => $this->controllerDetails,
            'rolesOptions' => isset($getRoles['data']) ? $getRoles['data'] : [],
            'dosenOptions' => isset($getDosenCascader['data']) ? $getDosenCascader['data'] : []
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'dosen_id' => $request->dosen_id
        ];

        $getRoles = $this->postAPI($param, 'user/create');
        return json_encode($getRoles);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if (!empty($request->password)) {
            if ($request->password != $request->confirmpassword) {
                return json_encode(['error' => 'Gagal membuat user, harap periksa kembali password anda !']);
            }
        }

        if (!isset($request->user_id) || empty($request->user_id)) {
            return json_encode(['error' => 'Periksa ID Pengguna !']);
        }

        $param = [
            'username' => $request->username,
            'user_id' => $request->user_id,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
            'confirmPassword' => $request->confirmpassword,
            'dosen_id' => $request->dosen_id
        ];

        $getRoles = $this->postAPI($param, 'user/update');
        return json_encode($getRoles);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $param = [
            'user_id' => $id
        ];
        
        $getData = $this->postAPI($param, 'user/delete');
        return $getData;
    }

    public function getAll(Request $request) {
        // Param datatables harus dikirim ke be juga
        $dataTablesParam = $request->all();
        $getData = $this->postAPI($dataTablesParam, 'user/get-all');

        $data = $getData['data'];

        $dataTables =  DataTables::of($data)
        ->addColumn('action', function ($data) {
            $button = '<button type="button" name="edit" id="' . $data['id'] . '" class="edit btn btn-primary btn-sm">Edit</button>';
            $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['id'] . '" class="delete btn btn-danger btn-sm" ' . ($data['id'] == 1 ? "disabled" : "") . '>Delete</button>';
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);

        return $dataTables;
    }

    public function getUser(Request $request, $id) {
        $param = [
            'user_id' => $id
        ];
        $getData = $this->postAPI($param, 'user/get-user');

        return json_encode(isset($getData['data']) ? $getData['data'] : []);
    }
}
