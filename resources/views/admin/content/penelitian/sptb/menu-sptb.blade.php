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
                                    <div class="col-lg-12">
                                        <strong style="font-size: 28px;">Surat Pernyataan Tanggung Jawab
                                            Belanja</strong>
                                        <br>
                                        <div class="float-left">
                                            Tahun Pelaksanaan:
                                            <select name="ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan"
                                                    onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaan\',\'\')', 0)"
                                                    id="ContentPlaceHolder1_ctl00_ddlThnPelaksanaan"
                                                    class="custom-select">
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2019">2019</option>

                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-lg-5" style="text-align: right;">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12 table-responsive">
                                        <div>
                                            <table class="table-striped table-hover" cellspacing="0" cellpadding="4"
                                                   id="ContentPlaceHolder1_ctl00_gvSPTB"
                                                   style="color:#333333;width:100%;border-collapse:collapse;">
                                                <tbody>
                                                <tr style="color:White;background-color:#5D7B9D;font-weight:bold;">
                                                    <th scope="col" style="width:25px;">No.</th>
                                                    <th scope="col" style="width:250px;">Program</th>
                                                    <th scope="col" style="width:550px;">Judul</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                                <tr style="color:#333333;background-color:#F7F6F3;">
                                                    <td align="center" valign="top" style="width:25px;">
                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblNomor_0">1</span>
                                                    </td>
                                                    <td align="left" valign="top" style="width:250px;">
                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblProgamHibah_0"
                                                              style="font-weight:bold;">Penelitian Kompetitif Nasional</span><br>
                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblSkema_0"
                                                              style="color:DarkGreen;">Penelitian Dosen Pemula</span>
                                                        <br>
                                                        Usulan tahun ke <span style="color: maroon;">1&nbsp;dari 1&nbsp;tahun</span>
                                                    </td>
                                                    <td align="left" valign="top" style="width:550px;">
                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblJudul_0">PENGARUH DEEP BACK DAN RUBBING MASSAGE TERHADAP PENURUNAN INTENSITAS NYERI DAN PERCEPATAN  PEMBUKAAN SERVIKS IBU BERSALIN DI BPM KABUPATEN SLEMAN</span><br>
                                                        <span style="background-color: red">

                                                    </span>
                                                    </td>
                                                    <td align="left" valign="top">

                                                        &nbsp;
                                                        &nbsp;
                                                        <br>


                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblketsptb70_0"
                                                              style="font-size:Smaller;font-weight:bold;">SPTB 70%</span>&nbsp;&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbCetakPengesahan70_0"
                                                           title="Cetak Surat Pernyataan Tanggung Jawab Belanja 70%"
                                                           class="fa fa-print btn btn-primary"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbCetakPengesahan70','')"></a>&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbUnggahTanggungJawabBelanja70_0"
                                                           title="Unggah Surat Pernyataan Tanggung Jawab Belanja 70%"
                                                           class="fa fa-upload btn btn-primary"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbUnggahTanggungJawabBelanja70','')"></a>&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbUnduhTanggungJawabBelanja70_0"
                                                           title="Unduh Surat Pernyataan Tanggung Jawab Belanja 70%"
                                                           class="fa fa-file-pdf-o btn btn-success"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbUnduhTanggungJawabBelanja70','')"></a>
                                                        <br>

                                                        <span id="ContentPlaceHolder1_ctl00_gvSPTB_lblketsptb30_0"
                                                              style="font-size:Smaller;font-weight:bold;">SPTB 100%</span>&nbsp;&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbCetakPengesahan30_0"
                                                           title="Cetak Surat Pernyataan Tanggung Jawab Belanja 100%"
                                                           class="fa fa-print btn btn-primary"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbCetakPengesahan30','')"></a>&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbUnggahTanggungJawabBelanja30_0"
                                                           title="Unggah Surat Pernyataan Tanggung Jawab Belanja 100%"
                                                           class="fa fa-upload btn btn-primary"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbUnggahTanggungJawabBelanja30','')"></a>&nbsp;
                                                        <a id="ContentPlaceHolder1_ctl00_gvSPTB_lbUnduhTanggungJawabBelanja30_0"
                                                           title="Unduh Surat Pernyataan Tanggung Jawab Belanja 100%"
                                                           class="fa fa-file-pdf-o btn btn-success"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvSPTB$ctl02$lbUnduhTanggungJawabBelanja30','')"></a>
                                                        <br>


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
