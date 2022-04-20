<?php

namespace App\Http\Controllers\Admin\SisterData;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;

class PenelitianSisterController extends Controller
{
    private $controllerDetails;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Daftar Penelitian Sister",
            "pageDescription" => "Halaman Daftar Penelitian Sister"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.content.sister.penelitian.daftar-penelitian')->with([
            'detailController' => $this->controllerDetails,
        ]);
    }

    public function filter(Request $request)
    {
        return redirect()->route('sister.daftar-penelitian');
        // return redirect()->route('sister.daftar-penelitian', $request->reviewer_id)->with('message', $simpanData['success']);
    }
}
