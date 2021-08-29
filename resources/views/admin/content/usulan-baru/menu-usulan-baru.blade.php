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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="md-card-block">


                            <div class="card-body">


                                <div id="ContentPlaceHolder1_ctl00_persyaratan_upPersyaratanUmum">

                                    <div class="row">
                                        <div class="col-sm-12 p-0">
                                            <div class="main-header" style="margin-top: 0px;">
                                            </div>
                                        </div>
                                    </div>

                                    <section class="panels-wells">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text" style="color: darkred">H-Index:
                                                        <span id="ContentPlaceHolder1_ctl00_persyaratan_lblHindex"
                                                              style="color:DarkRed;font-weight:bold;">0</span>
                                                        &nbsp;(<span
                                                            id="ContentPlaceHolder1_ctl00_persyaratan_lblKelompokBidang"
                                                            style="color:DarkRed;font-weight:bold;">Sain-Teknologi</span>)
                                                    </h5>
                                                    <h5 class="card-header-text f-right" style="color: darkred">Usulan
                                                        Baru:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_persyaratan_lblJmlUsulanBaru"
                                                            style="color:DarkRed;font-weight:bold;">2</span>
                                                    </h5>
                                                </div>
                                                <div class="card-block">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="panel panel-default">
                                                                <div class="panel-heading bg-default txt-white">
                                                                    Persyaratan Umum
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div
                                                                        id="ContentPlaceHolder1_ctl00_persyaratan_pnlCekSinta">

                                                                        <div>
                                                                            <label for="chkSinta">
                                                                                <i class="fa fa-check"
                                                                                   style="color: green"></i>&nbsp;Terdaftar
                                                                                dalam Sinta&nbsp;
                                                                                <b style="color: green">(</b><span
                                                                                    id="ContentPlaceHolder1_ctl00_persyaratan_lblIdSinta"
                                                                                    style="color:Green;font-weight:bold;">6013452</span><b
                                                                                    style="color: green">)</b>
                                                                            </label>
                                                                        </div>

                                                                    </div>

                                                                    <div
                                                                        id="ContentPlaceHolder1_ctl00_persyaratan_pnlPegawai">

                                                                        <div>
                                                                            <label for="chkStatusPegawai">
                                                                                <i class="fa fa-check"
                                                                                   style="color: green"></i>&nbsp;Status
                                                                                Pegawai&nbsp;
                                                                                <b style="color: green">(</b><span
                                                                                    id="ContentPlaceHolder1_ctl00_persyaratan_lblStsPegawai"
                                                                                    style="color:Green;font-weight:bold;">Aktif Mengajar</span><b
                                                                                    style="color: green">)</b>
                                                                            </label>
                                                                        </div>

                                                                    </div>


                                                                    <div
                                                                        id="ContentPlaceHolder1_ctl00_persyaratan_pnlTanggungan">

                                                                        <div>
                                                                            <label for="chkTanggungan">
                                                                                <i class="fa fa-check"
                                                                                   style="color: green"></i>&nbsp;Tanggungan
                                                                                Kegiatan&nbsp;
                                                                                <b style="color: green">(</b><span
                                                                                    id="ContentPlaceHolder1_ctl00_persyaratan_lblTanggungan"
                                                                                    style="color:Green;font-weight:bold;">Tidak ada</span><b
                                                                                    style="color: green">)</b>
                                                                            </label>
                                                                        </div>

                                                                    </div>


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>


                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                </div>

                            </div>

                            <div class="card-body">
                                <div class="col-md-6 form-inline">
                                    <label class="col-form-label">Tahun Usulan:&nbsp;&nbsp;</label>
                                    <select name="ctl00$ContentPlaceHolder1$ctl00$ddlThnUsulan"
                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ddlThnUsulan\',\'\')', 0)"
                                            id="ContentPlaceHolder1_ctl00_ddlThnUsulan" class="form-control"
                                            style="width:80px;">
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option selected="selected" value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>

                                    </select>&nbsp;Pelaksanaan:&nbsp;
                                    <select name="ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaanKegiatan"
                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$ddlThnPelaksanaanKegiatan\',\'\')', 0)"
                                            id="ContentPlaceHolder1_ctl00_ddlThnPelaksanaanKegiatan"
                                            class="form-control" style="width:80px;">
                                        <option value="2022">2022</option>
                                        <option selected="selected" value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>

                                    </select>
                                </div>


                                <div class="col-md-6" style="text-align: right;">

                                    <a id="ContentPlaceHolder1_ctl00_lbPengajuanBaru" class="btn btn-success"
                                       href="{{route('penelitian-usulanbaru.lanjutkan-usulan')}}">
                                        <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Lanjutkan
                                    </a>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-sm-12 p-0">
                                    <div class="main-header" style="margin-top: 0px;">
                                    </div>
                                </div>
                            </div>

                            <section class="panels-wells">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-block">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading bg-default txt-white">
                                                            Daftar Usulan Penelitian Baru
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-lg-12">

                                                                    <table class="table table-hover">
                                                                        <tbody>
                                                                        <tr>
                                                                            <td style="text-align: left; padding: 0;"></td>
                                                                            <td style="width: 30px; text-align: left; padding: 0;"></td>
                                                                            <td style="width: 30px; text-align: left; padding: 0;"></td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <p></p><h6><b style="color: blue">Pengembangan
                                                                                        Pelayanan Fisioterapi Kesehatan
                                                                                        wanita di RS PKU Muhammadiyah
                                                                                        Yogyakarta&nbsp;&nbsp;


                                                                                    </b></h6>
                                                                                <p></p>
                                                                                <h6 style="color: green">Penelitian
                                                                                    Dasar</h6>
                                                                                <h6 style="color: darkred">Thn Usulan
                                                                                    2020 | Thn Pelaksanaan 2021</h6>
                                                                                <b>Bidang Fokus:</b> Kesehatan -
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblPeranPersonil_0"
                                                                                    class="label bg-info">Ketua Pengusul</span>&nbsp;
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblStsKonfirmasi_0"
                                                                                    class="label bg-warning"></span><br>
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblStsApproval_0"
                                                                                    style="background-color:LightGreen;">Proposal disetujui untuk diusulkan</span>
                                                                            </td>
                                                                            <td>

                                                                                <div
                                                                                    style="height: 5px; width: 5px;"></div>


                                                                                <div
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_panelUnduhPdf_0">

                                                                                    <a id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lbUnduhProposalLengkap_0"
                                                                                       title="Unduh Proposal Lengkap"
                                                                                       class="fa fa-file-pdf-o"
                                                                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lstUsulanBaru$lvDaftarUsulanBaru$ctrl0$lbUnduhProposalLengkap','')"
                                                                                       style="color:Red;font-size:70px;"></a>


                                                                                </div>


                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td>
                                                                                <p></p><h6><b style="color: blue">Efektivitas
                                                                                        Modern Dressing Kombinasi Dengan
                                                                                        Bahan Alam Dalam Penyembuhan
                                                                                        Luka Pada Pasien Diabetik&nbsp;&nbsp;


                                                                                    </b></h6>
                                                                                <p></p>
                                                                                <h6 style="color: green">Penelitian
                                                                                    Dasar Unggulan Perguruan Tinggi</h6>
                                                                                <h6 style="color: darkred">Thn Usulan
                                                                                    2020 | Thn Pelaksanaan 2021</h6>
                                                                                <b>Bidang Fokus:</b> Kesehatan -
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblPeranPersonil_1"
                                                                                    class="label bg-info">Anggota Pengusul 2</span>&nbsp;
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblStsKonfirmasi_1"
                                                                                    class="label bg-warning">Setuju</span><br>
                                                                                <span
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lblStsApproval_1"
                                                                                    style="background-color:LightGreen;">Proposal disetujui untuk diusulkan</span>
                                                                            </td>
                                                                            <td>

                                                                                <div
                                                                                    style="height: 5px; width: 5px;"></div>


                                                                                <div
                                                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_panelUnduhPdf_1">

                                                                                    <a id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lvDaftarUsulanBaru_lbUnduhProposalLengkap_1"
                                                                                       title="Unduh Proposal Lengkap"
                                                                                       class="fa fa-file-pdf-o"
                                                                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lstUsulanBaru$lvDaftarUsulanBaru$ctrl1$lbUnduhProposalLengkap','')"
                                                                                       style="color:Red;font-size:70px;"></a>


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
                                </div>
                            </section>

                            <div class="modal modal-danger" id="modalHapus" role="dialog"
                                 aria-labelledby="myModalHapus">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title" id="myModalHapus">Konfirmasi Hapus Usulan</h4>
                                        </div>
                                        <div class="modal-body">
                                            Apakah yakin akan menghapus usulan:<br>
                                            Judul:&nbsp;<b><span
                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lblModalJudul"></span></b><br>
                                            Skema:&nbsp;<b>
                                                <span id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lblModalSkema"></span></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger pull-right"
                                                    data-dismiss="modal">Batal
                                            </button>
                                            <a onclick="$('#modalHapus').modal('hide');"
                                               id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lbHapus"
                                               class="btn btn-success"
                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lstUsulanBaru$lbHapus','')">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="modalBatalkanUsulan" tabindex="-1" role="dialog"
                                 aria-labelledby="modalTitle" aria-hidden="true" data-backdrop="false"
                                 style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle">Konfirmasi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin akan membatalkan pengiriman usulan ini ?</p>
                                            <p class="text-primary"><span
                                                    id="ContentPlaceHolder1_ctl00_lstUsulanBaru_lblJudulDibatalkan"
                                                    style="font-weight:bold;"></span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit"
                                                   name="ctl00$ContentPlaceHolder1$ctl00$lstUsulanBaru$btnBatalkanUsulan"
                                                   value="Batalkan"
                                                   id="ContentPlaceHolder1_ctl00_lstUsulanBaru_btnBatalkanUsulan"
                                                   class="btn btn-danger">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup
                                            </button>
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
