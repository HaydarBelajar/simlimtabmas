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


                                    <section class="panels-wells">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5 class="card-header-text float-left" style="color: darkred">H-Index:
                                                        <span id="ContentPlaceHolder1_ctl00_persyaratan_lblHindex"
                                                              style="color:DarkRed;font-weight:bold;">0</span>
                                                        &nbsp;(<span
                                                            id="ContentPlaceHolder1_ctl00_persyaratan_lblKelompokBidang"
                                                            style="color:DarkRed;font-weight:bold;">Sain-Teknologi</span>)
                                                    </h5>
                                                    <h5 class="card-header-text float-right" style="color: darkred">Usulan
                                                        Lanjutan:
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_persyaratan_lblJmlUsulanBaru"
                                                            style="color:DarkRed;font-weight:bold;">0</span>
                                                    </h5>
                                                </div>

                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">
                                                                <div class="card-header bg-default txt-white">
                                                                    Persyaratan Umum
                                                                </div>
                                                                <div class="card-body">
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
                                                </div>
                                            </div>
                                        </div>
                                    </section>


                                    <div class="row">
                                        <div class="col-sm-12 p-0">
                                            <div class="main-header" style="margin-top: 0px;">
                                            </div>
                                        </div>
                                    </div>

                                    <section class="panels-wells">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="card">


                                                                <div class="card-header bg-default txt-white">
                                                                    Pengajuan Usulan Penelitian Lanjutan
                                                                </div>
                                                                <div class="card-body">

                                                                    <div class="alert alert-light text-primary"
                                                                         role="alert">
                                                                        Belum ada data Usulan lanjutan.
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="card">

                                                                <div class="card-header bg-default txt-white">
                                                                    Daftar Usulan Penelitian Lanjutan
                                                                </div>
                                                                <div class="card-body">

                                                                    <div class="alert alert-light text-primary"
                                                                         role="alert">
                                                                        Belum ada data Usulan lanjutan.
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                    <h4 class="modal-title" id="myModalHapus">Konfirmasi Hapus
                                                        Usulan</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah yakin akan menghapus usulan:<br>
                                                    Judul:&nbsp;<b><span
                                                            id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_lblModalJudul"></span></b><br>
                                                    Skema:&nbsp;<b>
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_lblModalSkema"></span></b>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger pull-right"
                                                            data-dismiss="modal">Batal
                                                    </button>
                                                    <a onclick="$('#modalHapus').modal('hide');"
                                                       id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_lbHapus"
                                                       class="btn btn-success"
                                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lstUsulanLanjutan$lbHapus','')">Hapus</a>
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
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin akan membatalkan pengiriman usulan ini ?</p>
                                                    <p class="text-primary">
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_lblJudulDibatalkan"
                                                            style="font-weight:bold;"></span></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit"
                                                           name="ctl00$ContentPlaceHolder1$ctl00$lstUsulanLanjutan$btnBatalkanUsulan"
                                                           value="Batalkan"
                                                           id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_btnBatalkanUsulan"
                                                           class="btn btn-danger">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="modalKonfirmasiUsulanLanjutan" tabindex="-1"
                                         role="dialog" aria-labelledby="modalTitle" aria-hidden="true"
                                         data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle3">Konfirmasi</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin akan mengajukan usulan lanjutan ini?</p>
                                                    <p class="text-primary">
                                                        <span
                                                            id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_lblInfoUsulanLanjutan"
                                                            style="font-weight:bold;"></span></p>
                                                    <p class="text-primary">
                                                    </p>
                                                    <p></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <input type="submit"
                                                           name="ctl00$ContentPlaceHolder1$ctl00$lstUsulanLanjutan$btAjukan"
                                                           value="Ajukan >>"
                                                           id="ContentPlaceHolder1_ctl00_lstUsulanLanjutan_btAjukan"
                                                           class="btn btn-success">
                                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                                        Batal
                                                    </button>
                                                </div>
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
