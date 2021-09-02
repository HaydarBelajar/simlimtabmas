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
                                                <div class="main-header">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Buku</h5>

                                            </div>
                                            <div class="card-body">
                                                <div class="card-body">
                                                    <div class="view-info">
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-2 col-form-label form-control-label">Judul</label>
                                                            <div class="col-sm-10">
                                                            <textarea
                                                                name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbJudul"
                                                                rows="3" cols="20"
                                                                id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbJudul"
                                                                class="form-control"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label form-control-label">Tahun
                                                                Terbit</label>
                                                            <div class="col-sm-2">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbTahunTerbit"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbTahunTerbit"
                                                                    class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-2 col-form-label form-control-label">ISBN</label>
                                                            <div class="col-sm-10 col-xs-12">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbISBN"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbISBN"
                                                                    class="form-control" placeholder="ISBN">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label form-control-label">Jumlah
                                                                Halaman</label>
                                                            <div class="col-sm-2">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbJumlahHalaman"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbJumlahHalaman"
                                                                    class="form-control" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label form-control-label">Nama
                                                                Penerbit</label>
                                                            <div class="col-sm-10 col-xs-12">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbNamaPenerbit"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbNamaPenerbit"
                                                                    class="form-control" placeholder="Nama Penerbit">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-2 col-form-label form-control-label">URL</label>
                                                            <div class="col-sm-10 col-xs-12">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$tbURL"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_buku_tbURL"
                                                                    class="form-control" placeholder="http://">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label
                                                                class="col-sm-2 col-form-label form-control-label">Unggah</label>
                                                            <div class="col-sm-10">
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_buku_lbUnggahDokumen"
                                                                   class="btn btn-success"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$lbUnggahDokumen','')">Unggah
                                                                </a>
                                                                <small class="text-danger">Ukuran berkas maksimal 1
                                                                    MB</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row m-t-30">
                                            <div class="col-sm-12 text-center">
                                                <input type="submit"
                                                       name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$btnSimpan"
                                                       value="Simpan"
                                                       id="ContentPlaceHolder1_ctl00_cvKetua_buku_btnSimpan"
                                                       class="btn btn-primary waves-effect waves-light">&nbsp;
                                                <input type="submit"
                                                       name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$btnBatal"
                                                       value="Batal"
                                                       id="ContentPlaceHolder1_ctl00_cvKetua_buku_btnBatal"
                                                       class="btn btn-default waves-effect waves-light">
                                            </div>
                                        </div>


                                        <div class="modal fade" id="modalKonfirmasiHapus" tabindex="-1" role="dialog"
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
                                                        <p>Apakah Anda yakin akan menghapus data ini ?</p>
                                                        <p class="text-primary"><span
                                                                id="ContentPlaceHolder1_ctl00_cvKetua_buku_lblJudulDihapus"
                                                                style="font-weight:bold;"></span></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit"
                                                               name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$btnKonfirmasiHapus"
                                                               value="Hapus"
                                                               id="ContentPlaceHolder1_ctl00_cvKetua_buku_btnKonfirmasiHapus"
                                                               class="btn btn-primary">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalUnggahBerkas" tabindex="-1" role="dialog"
                                             aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="false"
                                             style="background-color: rgba(0, 0, 0, 0.5);">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card">
                                                                    <div class="card-header">
                                                                        <h4><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;Unggah
                                                                            Artikel Jurnal</h4>
                                                                    </div>
                                                                    <div class="card-body">
                                                                        <div>
                                                                            <iframe src="Helper/unggahFile.aspx"
                                                                                    id="iframeUpload" width="100%"
                                                                                    frameborder="0"
                                                                                    height="150px"></iframe>
                                                                        </div>
                                                                        <div class="form-control">
                                                                            <div
                                                                                style="font-size: 14px; padding: 10px;">
                                                                                Ekstensi: pdf;PDF.
                                                                            </div>
                                                                            <div
                                                                                style="font-size: 14px; padding: 10px;">
                                                                                Maksimal: 1 MB<br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_buku_lbSelesaiUnggah"
                                                                   class="btn btn-secondary"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$buku$lbSelesaiUnggah','')">
                                                                    <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Selesai
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <a id="ContentPlaceHolder1_ctl00_cvKetua_lbKembaliBuku"
                                               class="btn btn-info waves-effect"
                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$lbKembaliBuku','')">Kembali</a>
                                        </div>

                                    </div>

                                </div>
                                <div class="card-footer col-md-12" style="text-align: right;">
                                    <a id="ContentPlaceHolder1_ctl00_lbLanjutkanAtCVKetua" class="btn btn-success"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbLanjutkanAtCVKetua','')">
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
