<?php

namespace App\Http\Controllers\Admin\RolesPermissions;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Manajemen Permissions",
            "pageDescription" => "Halaman Manajemen Permissions"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
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

    public function getAll(Request $request)
    {
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
