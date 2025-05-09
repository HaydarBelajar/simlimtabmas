<?php

namespace App\Http\Controllers\Admin\RolesPermissions;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DataTables;

class RolesController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Manajemen Roles",
            "pageDescription" => "Halaman Manajemen Roles"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.content.roles.index')->with([
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
        $getRolesData = $this->postAPI([
            'role_id' => $id,
        ], 'roles/get');

        $getPermissionsData = $this->postAPI([
            'groupBy' => 'module',
        ], 'permissions/get-filter');

        return view('admin.content.roles.edit')->with([
            'page' => 'edit',
            'detailController' => $this->controllerDetails,
            'roleData' => isset($getRolesData['data']) ? $getRolesData['data'] : [],
            'permissionData' => isset($getPermissionsData['data']) ? $getPermissionsData['data'] : [],
        ]);
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
        $simpanData = $this->postAPI([
            'role_id' => $id,
            'permission' => $request->permission,
            'name' => $request->name,
        ], 'roles/update');
        
        if (isset($simpanData['success'])) {
            return redirect()->route('roles.index')->with('message', $simpanData['success']);
        } else {
            return redirect()->route('roles.index')->with('error', $simpanData['error'] ?? $simpanData['reason']);
        }
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
        $getData = $this->postAPI($dataTablesParam, 'roles/get-filter');

        $data = $getData['data'] ?? [];

        $dataTables =  DataTables::of($data)
            ->addColumn('action', function ($data) {
                $button = '<a href="' . route('roles.show', ['role' => $data['id']]) . '" type="button" name="view" id="' . $data['id'] . '" class="view btn btn-primary btn-sm">View</a>';
                // $button .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="' . $data['id'] . '" class="delete btn btn-danger btn-sm" ' . ($data['id'] == 1 ? "disabled" : "") . '>Delete</button>';
                return $button;
            })
            ->rawColumns(['action'])
            ->make(true);

        return $dataTables;
    }
}
