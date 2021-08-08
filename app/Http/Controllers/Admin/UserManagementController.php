<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\AuthTraits;
use DataTables;

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

        return view('admin.content.menu-user-list')->with([
            'detailController' => $this->controllerDetails,
            'rolesOptions' => isset($getRoles['data']) ? $getRoles['data'] : []
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
}
