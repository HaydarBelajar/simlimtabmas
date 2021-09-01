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
                                                <h5 class="card-header-text float-left">Artikel Prosiding</h5>
                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lbClose"
                                                   class="btn btn-primary waves-effect waves-light float-right"
                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$lbClose','')">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                            <div class="card-body">
                                                <div class="card-body">
                                                    <div class="edit-info">
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="general-info">
                                                                    <div class="row">
                                                                        <div class="col-lg-8">
                                                                            <table class="table">
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbJudul"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Judul</label>
                                                                                            <div class="col-sm-8">
                                                                                            <textarea
                                                                                                name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbJudul"
                                                                                                rows="3" cols="20"
                                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbJudul"
                                                                                                class="form-control"
                                                                                                placeholder="Judul Prosiding"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbNamaProsiding"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Nama
                                                                                                Prosiding</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbNamaProsiding"
                                                                                                    type="text"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbNamaProsiding"
                                                                                                    class="form-control"
                                                                                                    placeholder="Nama Prosiding">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="ddlThnProsiding"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Tahun
                                                                                                Prosiding</label>
                                                                                            <div class="col-sm-2">
                                                                                                <select
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$ddlThnProsiding"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_ddlThnProsiding"
                                                                                                    class="form-control">
                                                                                                    <option
                                                                                                        value="2021">
                                                                                                        2021
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2020">
                                                                                                        2020
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2019">
                                                                                                        2019
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2018">
                                                                                                        2018
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2017">
                                                                                                        2017
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2016">
                                                                                                        2016
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2015">
                                                                                                        2015
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2014">
                                                                                                        2014
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2013">
                                                                                                        2013
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2012">
                                                                                                        2012
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2011">
                                                                                                        2011
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2010">
                                                                                                        2010
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2009">
                                                                                                        2009
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2008">
                                                                                                        2008
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2007">
                                                                                                        2007
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2006">
                                                                                                        2006
                                                                                                    </option>
                                                                                                    <option
                                                                                                        value="2005">
                                                                                                        2005
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="ddlPeranPenulis"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Peran
                                                                                                Penulis</label>
                                                                                            <div class="col-sm-4">
                                                                                                <select
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$ddlPeranPenulis"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_ddlPeranPenulis"
                                                                                                    class="form-control">
                                                                                                    <option
                                                                                                        selected="selected"
                                                                                                        value="1">first
                                                                                                        author
                                                                                                    </option>
                                                                                                    <option value="2">
                                                                                                        co-author
                                                                                                    </option>
                                                                                                    <option value="3">
                                                                                                        corresponding
                                                                                                        author
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbVolume"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Volume</label>
                                                                                            <div class="col-sm-4">
                                                                                                <input
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbVolume"
                                                                                                    type="text"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbVolume"
                                                                                                    class="form-control"
                                                                                                    placeholder="Volume (jika ada)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbNomor"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Nomor</label>
                                                                                            <div class="col-sm-4">
                                                                                                <input
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbNomor"
                                                                                                    type="text"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbNomor"
                                                                                                    class="form-control"
                                                                                                    placeholder="Nomor (jika ada)">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbIssn"
                                                                                                   class="col-sm-4 col-form-label form-control-label">ISBN/ISSN</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbIssn"
                                                                                                    type="text"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbIssn"
                                                                                                    class="form-control"
                                                                                                    placeholder="ISBN/ISSN">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="tbUrl"
                                                                                                   class="col-sm-4 col-form-label form-control-label">URL</label>
                                                                                            <div class="col-sm-8">
                                                                                                <input
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$tbUrl"
                                                                                                    type="text"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_tbUrl"
                                                                                                    class="form-control"
                                                                                                    placeholder="URL">
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label
                                                                                                for="ddlJenisProsiding"
                                                                                                class="col-sm-4 col-form-label form-control-label">Jenis
                                                                                                Prosiding</label>
                                                                                            <div class="col-sm-4">
                                                                                                <select
                                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$ddlJenisProsiding"
                                                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_ddlJenisProsiding"
                                                                                                    class="form-control">
                                                                                                    <option
                                                                                                        selected="selected"
                                                                                                        value="9">Tidak
                                                                                                        diketahui
                                                                                                    </option>
                                                                                                    <option value="1">
                                                                                                        Terindeks
                                                                                                    </option>
                                                                                                    <option value="2">
                                                                                                        Tidak
                                                                                                        Terindeks
                                                                                                    </option>

                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>
                                                                                        <div class="form-group row">
                                                                                            <label for="file"
                                                                                                   class="col-sm-4 col-form-label form-control-label">Unggah
                                                                                                Berkas</label>
                                                                                            <div class="col-md-8">
                                                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lbUnggahDokumen"
                                                                                                   class="btn btn-info btn-flat"
                                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$lbUnggahDokumen','')">
                                                                                                    <i class="fa fa-cloud-upload">&nbsp;
                                                                                                        Unggah</i></a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </td>
                                                                                </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                    <div class="text-center">
                                                                        <a id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lbSimpan"
                                                                           class="btn btn-primary waves-effect waves-light m-r-20"
                                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$lbSimpan','')">Simpan</a>
                                                                        <a id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lbBatal"
                                                                           class="btn btn-default waves-effect"
                                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$lbBatal','')">Batal</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="modal modal-danger" id="modalHapus" role="dialog"
                                             aria-labelledby="myModalHapus">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                        <h4 class="modal-title" id="myModalHapus">Konfirmasi Hapus
                                                            Artikel Prosiding</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah yakin akan menghapus artikel prosiding
                                                        &nbsp;<b><span
                                                                id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lblJudulProsidingHapus"></span>&nbsp;?</b>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-right"
                                                                data-dismiss="modal">Batal
                                                        </button>
                                                        <a onclick="$('#modalHapus').modal('hide');"
                                                           id="ContentPlaceHolder1_ctl00_cvKetua_prosiding_lbHapus"
                                                           class="btn btn-info"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$prosiding$lbHapus','')">Hapus</a>
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
                                                                            Artikel Prosiding</h4>
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
                                                                <button class="btn btn-secondary" data-dismiss="modal">
                                                                    <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Selesai
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div>
                                            <a id="ContentPlaceHolder1_ctl00_cvKetua_lbKembaliProsiding"
                                               class="btn btn-info waves-effect"
                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$lbKembaliProsiding','')">Kembali</a>
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
