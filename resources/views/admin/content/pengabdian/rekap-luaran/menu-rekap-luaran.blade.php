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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="md-card-body">

                                <div class="row">
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                        <h4 style="color:black"><i class="icon fa fa-info">&nbsp;</i>Info Luaran Wajib
                                            dan Tambahan Tahun 2019</h4>
                                        <p style="color:black">
                                            Luaran wajib dan luaran tambahan pendanaan tahun 2019 melalui LOGIN NG 2.0,
                                            <b>untuk kontrak jamak</b> pada menu laporan kemajuan, sedangkan
                                            <b>untuk kontrak tunggal</b> pada menu laporan akhir.
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <strong style="font-size: 28px;">Rekap Luaran</strong>
                                        <br>
                                        Tahun Pelaksanaan:
                                        <select name="ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan"
                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan\',\'\')', 0)"
                                                id="ContentPlaceHolder1_ctl00_ddlThnPelaksanaan" class="custom-select">
                                            <option selected="selected" value="2018">2018</option>
                                            <option value="2017">2017</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-5">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div>
                                            <table class="table-striped table-hover" cellspacing="0" cellpadding="4"
                                                   id="ContentPlaceHolder1_ctl00_gvLuaranDicapai"
                                                   style="color:#333333;width:100%;border-collapse:collapse;">
                                                <tbody>
                                                <tr style="color:White;background-color:#5D7B9D;font-weight:bold;">
                                                    <th align="center" scope="col" style="width:20px;">No</th>
                                                    <th align="center" scope="col" style="width:350px;">Judul
                                                        Penelitian
                                                    </th>
                                                    <th align="center" scope="col" style="width:80px;">Jumlah Luaran
                                                        Wajib
                                                    </th>
                                                    <th align="center" scope="col" style="width:80px;">Jumlah Luaran
                                                        Tambahan
                                                    </th>
                                                </tr>
                                                <tr style="color:#333333;background-color:#F7F6F3;">
                                                    <td align="center">
                                                        1
                                                    </td>
                                                    <td align="left" valign="middle">
                                                        Skema: <span style="color: blue; font-weight: bold;">Penelitian Dosen Pemula</span>
                                                        <br>
                                                        Judul: <span style="color: maroon; font-weight: bold;">PENGARUH PENGUATAN OTOT RECTUS ABDOMINIS TERHADAP PENURUNAN TFU PADA IBU POSTPARTUM PERVAGINAM DI BPM KABUPATEN SLEMAN</span><br>
                                                        Usulan tahun ke-<span style="color: maroon;">1dari 1</span>
                                                    </td>
                                                    <td align="center">
                                                        <div>
                                                            <a id="ContentPlaceHolder1_ctl00_gvLuaranDicapai_lbLuaranWajib_0"
                                                               title="Lengkapi" class="btn btn-primary btn-sm"
                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLuaranDicapai$ctl02$lbLuaranWajib','')"
                                                               style="font-size:Larger;">1</a>
                                                        </div>
                                                    </td>
                                                    <td align="center">
                                                        <div style="margin-top: 5px;">
                                                            <a id="ContentPlaceHolder1_ctl00_gvLuaranDicapai_lbLuaranTambahan_0"
                                                               title="Lengkapi" class="btn btn-primary btn-sm"
                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLuaranDicapai$ctl02$lbLuaranTambahan','')"
                                                               style="font-size:Larger;">1</a>
                                                        </div>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
    @endpush
@endsection
