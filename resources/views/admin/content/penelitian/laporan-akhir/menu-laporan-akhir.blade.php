@extends('admin.layout')
@extends('admin.header')
@extends('admin.body')
@extends('admin.footer')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ $detailController['pageDescription'] ?? '' }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                            <li class="breadcrumb-item active">{{ $detailController['currentPage'] ?? '' }}</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">
                                <div class="col-sm-12 pull-left ">
                                        <span id="ContentPlaceHolder1_ctl00_lblJudulForm"
                                              style="font-size:Larger;font-weight:bold;">LAPORAN KEMAJUAN</span>
                                </div>
                                <div class="col-sm-12">
                                    <fieldset class="form-group">
                                        <div class="col-sm-12 pull-left">
                                            <div class="form-inline pull-left">
                                                Tahun Pelaksanaan&nbsp;
                                                <select name="ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan"
                                                        onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan\',\'\')', 0)"
                                                        id="ContentPlaceHolder1_ctl00_ddlThnPelaksanaan"
                                                        class="form-control input-sm">
                                                    <option value="2021">2021</option>
                                                    <option value="2020">2020</option>
                                                    <option selected="selected" value="2019">2019</option>

                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="col-sm-12 table-responsive">
                                            <div>
                                                <table class="table table-striped table-hover" cellspacing="0"
                                                       id="ContentPlaceHolder1_ctl00_gvLapKemajuan"
                                                       style="border-collapse:collapse;">
                                                    <tbody>
                                                    <tr>
                                                        <th scope="col" style="width:30px;">No.</th>
                                                        <th scope="col">Program</th>
                                                        <th scope="col">Judul</th>
                                                        <th scope="col">&nbsp;</th>
                                                        <th scope="col">&nbsp;</th>
                                                    </tr>
                                                    <tr>
                                                        <td align="center" valign="top" style="width:30px;">
                                                                <span
                                                                    id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblNo_0">1</span>
                                                        </td>
                                                        <td align="left" valign="top" style="width:300px;">
                                                                <span
                                                                    id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblProgHibah_0">Penelitian Kompetitif Nasional</span><br>
                                                            <span
                                                                id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblNamaSkema_0"
                                                                style="color:Green;">Penelitian Dosen Pemula</span><br>
                                                            Tahun&nbsp;ke:&nbsp;
                                                            <span
                                                                id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblUrutanThn_0"
                                                                style="font-weight:bold;">1</span>
                                                            &nbsp;dari&nbsp;
                                                            <span
                                                                id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblDurasi_0"
                                                                style="font-weight:bold;">1</span>
                                                            &nbsp;tahun
                                                        </td>
                                                        <td align="left" valign="top">
                                                                <span
                                                                    id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lblJudul_0">PENGARUH DEEP BACK DAN RUBBING MASSAGE TERHADAP PENURUNAN INTENSITAS NYERI DAN PERCEPATAN  PEMBUKAAN SERVIKS IBU BERSALIN DI BPM KABUPATEN SLEMAN</span>
                                                        </td>
                                                        <td align="left" valign="top" style="width:50px;">
                                                            <a id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lbUnduhLaporanKemajuan_0"
                                                               class="fa fa-file-pdf-o"
                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLapKemajuan$ctl02$lbUnduhLaporanKemajuan','')"
                                                               style="color:Red;font-size:30px;font-weight:bold;"></a>
                                                        </td>
                                                        <td align="left" valign="top" style="width:50px;">
                                                            <a id="ContentPlaceHolder1_ctl00_gvLapKemajuan_lbEdit_0"
                                                               title="Edit" class="btn btn-primary btn-sm"
                                                               href="{{route('laporan-kemajuan.edit')}}"
                                                               style="font-size:Medium;">
                                                                <i class="fa fa-pencil"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
    @endpush
@endsection
