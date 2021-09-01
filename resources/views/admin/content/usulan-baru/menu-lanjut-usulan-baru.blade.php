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


                                <div class="card-body">


                                    <div id="ContentPlaceHolder1_ctl00_cvKetua_upPersyaratanUmum">

                                        <div class="row">
                                            <div class="col-sm-12 p-0">
                                                <div class="main-header" style="margin-top: 0px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text float-left" style="color: darkred">H-Index:
                                                        <span id="lblHindex1"
                                                              style="color:DarkRed;font-weight:bold;">0</span>
                                                    </h5>
                                                    <h5 class="card-header-text float-right" style="color: darkred">
                                                        Usulan Baru:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_cvKetua_lblJmlUsulanBaru1"
                                                            style="color:DarkRed;font-weight:bold;">2</span>
                                                    </h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-default txt-white">
                                                                    Identitas Pengusul-Ketua
                                                                </div>
                                                                <div class="card-body">
                                                                    <div>

                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblNamaLengkap"
                                                                                   class="m-r-6 form-control-label">Nama:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblNamaLengkap">ENNY FITRIAHADI S.ST, M.Kes</span>
                                                                        </div>
                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblNidn"
                                                                                   class="m-r-6 form-control-label">NIDN/NIDK:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblNidn">0627048301</span>
                                                                        </div>
                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblNamaInstitusi"
                                                                                   class="m-r-6 form-control-label">Perguruan
                                                                                Tinggi:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblNamaInstitusi">Universitas Aisyiyah Yogyakarta</span>
                                                                        </div>
                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblProgramStudi"
                                                                                   class="m-r-6 form-control-label">Program
                                                                                Studi:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblProdi">Bidan Pendidik</span>
                                                                        </div>

                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblIdSinta1"
                                                                                   class="m-r-6 form-control-label">ID
                                                                                Sinta:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblIdSinta1">6013452</span>
                                                                        </div>
                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblKualifikasi"
                                                                                   class="m-r-6 form-control-label">Kualifikasi:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblKualifikasi">S-2</span>
                                                                        </div>
                                                                        <div class="form-group m-r-6">
                                                                            <label for="lblSurel"
                                                                                   class="m-r-6 form-control-label">Alamat
                                                                                Surel:</label>
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_lblSurel">ennyfitriahadi@unisayogya.ac.id</span>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-default txt-white">
                                                                    Skema Penelitian&nbsp;<span
                                                                        id="ContentPlaceHolder1_ctl00_cvKetua_lblKlaster">Kelompok PT Madya</span>
                                                                </div>
                                                                <div class="card-body">

                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 30px; text-align: left; padding: 0;"></td>
                                                                            <td style="text-align: left; padding: 0;"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>
                                                                                <h6>Penelitian Terapan Unggulan
                                                                                    Perguruan Tinggi</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>
                                                                                <h6>Penelitian Dasar Unggulan
                                                                                    Perguruan Tinggi</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>
                                                                                <h6>Penelitian Pengembangan Unggulan
                                                                                    Perguruan Tinggi</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>
                                                                                <h6>Penelitian Kerjasama Antar
                                                                                    Perguruan Tinggi</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>
                                                                                <h6>Penelitian Disertasi Doktor</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>6</td>
                                                                            <td>
                                                                                <h6>Penelitian Pasca Doktor</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>7</td>
                                                                            <td>
                                                                                <h6>Penelitian Pendidikan Magister
                                                                                    menuju Doktor untuk Sarjana
                                                                                    Unggul</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>8</td>
                                                                            <td>
                                                                                <h6>Penelitian Dasar</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>9</td>
                                                                            <td>
                                                                                <h6>Penelitian Terapan</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>10</td>
                                                                            <td>
                                                                                <h6>Penelitian Pengembangan</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>11</td>
                                                                            <td>
                                                                                <h6>Penelitian Tesis Magister</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>12</td>
                                                                            <td>
                                                                                <h6>Konsorsium Riset Unggulan
                                                                                    Perguruan Tinggi</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>13</td>
                                                                            <td>
                                                                                <h6>Kajian Kebijakan Strategis</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>14</td>
                                                                            <td>
                                                                                <h6>World Class Research</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>15</td>
                                                                            <td>
                                                                                <h6>Riset Kemitraan Dasar</h6>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>16</td>
                                                                            <td>
                                                                                <h6>Riset Kemitraan Terapan</h6>
                                                                            </td>
                                                                        </tr>

                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-default txt-white">
                                                                    Rekam Jejak
                                                                </div>
                                                                <div class="card-body">

                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="width: 30px; text-align: left; padding: 0;"></td>
                                                                            <td style="text-align: left; padding: 0;"></td>
                                                                            <td style="text-align: right; padding: 0;"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>
                                                                                <h6>Publikasi Artikel Jurnal
                                                                                    Internasional
                                                                                    <b style="color: red">(2)</b>

                                                                                </h6>
                                                                            </td>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_lvRekamJejak_lbEdit_0"
                                                                                   title="Tambah data"
                                                                                   class="btn btn-sm btn-primary waves-effect m-b-5"
                                                                                   href="{{route('penelitian-usulanbaru.jurnal-internasional')}}">
                                                                                    Tambah Data</a>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>2</td>
                                                                            <td>
                                                                                <h6>Publikasi Artikel Jurnal
                                                                                    Nasional
                                                                                    <b style="color: red">(18)</b>

                                                                                </h6>
                                                                            </td>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_lvRekamJejak_lbEdit_1"
                                                                                   title="Tambah data"
                                                                                   class="btn btn-sm btn-primary waves-effect m-b-5"
                                                                                   href="{{route('penelitian-usulanbaru.jurnal-nasional')}}">
                                                                                    Tambah Data</a>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>3</td>
                                                                            <td>
                                                                                <h6>Publikasi Artikel Prosiding
                                                                                    <b style="color: red">(5)</b>

                                                                                </h6>
                                                                            </td>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_lvRekamJejak_lbEdit_2"
                                                                                   title="Tambah data"
                                                                                   class="btn btn-sm btn-primary waves-effect m-b-5"
                                                                                   href="{{route('penelitian-usulanbaru.artikel-prosiding')}}">
                                                                                    Tambah Data</a>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>4</td>
                                                                            <td>
                                                                                <h6>Kekayaan Intelektual
                                                                                    <b style="color: red">(8)</b>

                                                                                </h6>
                                                                            </td>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_lvRekamJejak_lbEdit_3"
                                                                                   title="Tambah data"
                                                                                   class="btn btn-sm btn-primary waves-effect m-b-5"
                                                                                   href="{{route('penelitian-usulanbaru.kekayaan-intelektual')}}">
                                                                                    Tambah Data</a>
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>5</td>
                                                                            <td>
                                                                                <h6>Buku
                                                                                    <b style="color: red">(8)</b>

                                                                                </h6>
                                                                            </td>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_lvRekamJejak_lbEdit_4"
                                                                                   title="Tambah data"
                                                                                   class="btn btn-sm btn-primary waves-effect m-b-5"
                                                                                   href="{{route('penelitian-usulanbaru.buku')}}">
                                                                                    Tambah Data</a>
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
                                <div class="card-footer col-md-12" style="text-align: right;">
                                    <a id="ContentPlaceHolder1_ctl00_lbLanjutkanAtCVKetua" class="btn btn-success"
                                       href="{{route('penelitian-usulanbaru.identitas-usulan')}}">
                                        <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Lanjutkan
                                    </a>
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
