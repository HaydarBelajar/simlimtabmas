<?php

namespace App\Http\Controllers\Admin\Publikasi;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTraits;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Session;

class PublikasiPenelitianController extends Controller
{
    private $controllerDetails;
    private $controllerPenelitianDetails;
    private $controllerReviewerPenelitian;
    use AuthTraits;

    public function __construct()
    {
        $this->controllerDetails = [
            "currentPage" => "Publikasi",
            "pageDescription" => "Halaman Publikasi Penelitian"
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.content.publikasi.penelitian.index');
    }
}
