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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="md-card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-inline float-right" style="text-align: right;">
                                            <b>Tahun Pelaksanaan:</b>
                                            <select name="ctl00$ContentPlaceHolder1$ctl00$ktListUsulan$ddlTahun"
                                                    onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ktListUsulan$ddlTahun\',\'\')', 0)"
                                                    id="ContentPlaceHolder1_ctl00_ktListUsulan_ddlTahun"
                                                    class="form-control input-sm">
                                                <option value="2022">2022</option>
                                                <option value="2021">2021</option>
                                                <option value="2020">2020</option>
                                                <option selected="selected" value="2019">2019</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-header" style="margin-top: 0px;">
                                                <h4 style="color: maroon">DAFTAR USULAN PENELITIAN DIDANAI</h4>
                                                <br>
                                                <br>
                                                <b>NIDN/NIDK:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblNIDN"
                                                      style="color:MediumSeaGreen;font-weight:bold;">0627048301</span><br>
                                                <b>Perguruan Tinggi:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblInstitusi"
                                                      style="color:MediumSeaGreen;font-weight:bold;">Universitas Aisyiyah Yogyakarta</span>
                                                &nbsp; <b>|</b> <b>Program Studi:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblProgramStudi"
                                                      style="color:MediumSeaGreen;font-weight:bold;">Bidan Pendidik</span><br>
                                                <b>Kualifikasi:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblPendidikan"
                                                      style="color:MediumSeaGreen;font-weight:bold;">S-2</span>
                                                &nbsp; <b>|</b> <b>h-Index:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblHIndex"
                                                      style="color:MediumSeaGreen;font-weight:bold;">0</span>
                                                &nbsp; <b>ID Sinta:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblIdSinta"
                                                      style="color:MediumSeaGreen;font-weight:bold;">6013452</span><br>
                                                <b>Alamat Surel:</b>
                                                <span id="ContentPlaceHolder1_ctl00_ktListUsulan_lblSurel"
                                                      style="font-weight:bold;font-style:italic;">ennyfitriahadi@unisayogya.ac.id</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="alert alert-light" role="alert" style="background-color: lightgrey;">

                                        <span style="color: maroon; font-weight: bold; font-size: 18px;">Perbaikan Usulan Penelitian</span>

                                    </div>
                                    <div>
                                        <table cellspacing="0"
                                               id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan"
                                               style="border-collapse:collapse;">
                                            <tbody>
                                            <tr>
                                                <td align="left" valign="top">
                                                    <b style="color: blue; font-size: large;">
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblJudul_0">Pengaruh Dance Pregnancy Terhadap Diastasis Recti Pada Ibu Hamil di BPM Kabupaten Sleman</span></b>&nbsp;&nbsp;


                                                    <br>
                                                    <b>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblSkema_0"
                                                        style="color:MediumSeaGreen;">Penelitian Dosen Pemula</span></b>
                                                    &nbsp; <b style="color: maroon;">Thn Usulan:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnUsulan_0"
                                                            style="color:Maroon;">2018</span>
                                                        &nbsp; | Thn Pelaksanaan:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnPelaksanaan_0"
                                                            style="color:Maroon;">2019</span>
                                                        -
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnTerakhir_0"
                                                            style="color:Maroon;">2019</span></b><br>
                                                    Kelompok Makro Riset:
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblKlmpMakroRiset_0">Kelompok Riset lainnya</span><br>
                                                    Bidang Fokus:
                                                    <i>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblBidangFokus_0">Kesehatan</span></i>
                                                    &nbsp;-
                                                    <b>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblPeranPersonil_0"
                                                        style="background-color:Yellow;">Anggota Pengusul 1</span></b><br>
                                                    Total Dana Disetujui:
                                                    Rp<span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblTotalDanaDisetujui_0">20,000,000</span>
                                                    &nbsp;
                                                    (<span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblLamaKegiatan_0">1</span>
                                                    Tahun)<br>
                                                    Status perbaikan:
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblStsPerbaikan_0"
                                                        class="label label-success">Sudah diperbaiki</span>


                                                    <hr>
                                                </td>
                                                <td align="right" valign="top" style="width:150px;">
                                                    <a id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lbUnduhBerkas_0"
                                                       title="Unduh Berkas" class="fa fa-file-pdf-o"
                                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$ktListUsulan$gvUsulanPerbaikan$ctl02$lbUnduhBerkas','')"
                                                       style="color:Red;font-size:70px;"></a>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left" valign="top">
                                                    <b style="color: blue; font-size: large;">
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblJudul_1">PENGARUH DEEP BACK DAN RUBBING MASSAGE TERHADAP PENURUNAN INTENSITAS NYERI DAN PERCEPATAN  PEMBUKAAN SERVIKS IBU BERSALIN DI BPM KABUPATEN SLEMAN</span></b>&nbsp;&nbsp;


                                                    <br>
                                                    <b>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblSkema_1"
                                                        style="color:MediumSeaGreen;">Penelitian Dosen Pemula</span></b>
                                                    &nbsp; <b style="color: maroon;">Thn Usulan:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnUsulan_1"
                                                            style="color:Maroon;">2018</span>
                                                        &nbsp; | Thn Pelaksanaan:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnPelaksanaan_1"
                                                            style="color:Maroon;">2019</span>
                                                        -
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblThnTerakhir_1"
                                                            style="color:Maroon;">2019</span></b><br>
                                                    Kelompok Makro Riset:
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblKlmpMakroRiset_1">Kelompok Riset lainnya</span><br>
                                                    Bidang Fokus:
                                                    <i>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblBidangFokus_1">Kesehatan</span></i>
                                                    &nbsp;-
                                                    <b>
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblPeranPersonil_1"
                                                        style="background-color:Yellow;">Ketua Pengusul</span></b><br>
                                                    Total Dana Disetujui:
                                                    Rp<span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblTotalDanaDisetujui_1">20,000,000</span>
                                                    &nbsp;
                                                    (<span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblLamaKegiatan_1">1</span>
                                                    Tahun)<br>
                                                    Status perbaikan:
                                                    <span
                                                        id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lblStsPerbaikan_1"
                                                        class="label label-success">Sudah diperbaiki</span>


                                                    <hr>
                                                </td>
                                                <td align="right" valign="top" style="width:150px;">
                                                    <a id="ContentPlaceHolder1_ctl00_ktListUsulan_gvUsulanPerbaikan_lbUnduhBerkas_1"
                                                       title="Unduh Berkas" class="fa fa-file-pdf-o"
                                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$ktListUsulan$gvUsulanPerbaikan$ctl03$lbUnduhBerkas','')"
                                                       style="color:Red;font-size:70px;"></a>

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
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
    @endpush
@endsection
