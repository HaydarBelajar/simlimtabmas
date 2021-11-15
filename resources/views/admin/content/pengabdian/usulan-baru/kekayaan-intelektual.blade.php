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
                        <div class="card-block">
                            <div class="md-card-block">


                                <div class="card-body">


                                    <div id="ContentPlaceHolder1_ctl00_cvKetua_upPersyaratanUmum">
                                        <div class="row">
                                            <div class="col-sm-12 p-0">
                                                <div class="main-header">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="box box-info">
                                            <div class="box-body">
                                                <div class="row col-sm-12">
                                                    <div class="form-group col-lg-10 float-lg-left"
                                                         style="border-bottom: solid 1px;">
                        <span id="ContentPlaceHolder1_ctl00_cvKetua_hki_lblHKIDataBaru" style="font-size:25px;">Hak Kekayaan Intelektual -<a
                                style="color:green; font-size:20px;">Data Baru</a>
                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="tbJudulHKI" class="col-sm-2 control-label">Judul<i
                                                                    style="color: red">*</i></label>
                                                            <div class="col-sm-10">
                                                                <textarea
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$tbJudulHKI"
                                                                    rows="2" cols="20"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_tbJudulHKI"
                                                                    class="form-control"
                                                                    placeholder="Judul Hak Kekayaan Intelektual"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="ddljenisHKI" class="col-sm-2 control-label">Jenis
                                                                HKI<i style="color: red">*</i></label>
                                                            <div class="col-sm-4">
                                                                <select
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$ddlJenisHKI"
                                                                    id="ddlJenisHKI" class="form-control select2">
                                                                    <option value="1">Paten</option>
                                                                    <option value="2">Paten Sederhana</option>
                                                                    <option value="3">Hak Cipta</option>
                                                                    <option value="4">Merek Dagang</option>
                                                                    <option value="5">Rahasia Dagang</option>
                                                                    <option value="6">Desain Produk Industri</option>
                                                                    <option value="7">Indikasi Geografis</option>
                                                                    <option value="8">Perlindungan Varietas Tanaman
                                                                    </option>
                                                                    <option value="9">Perlindungan Topografi Sirkuit
                                                                        Terpadu
                                                                    </option>
                                                                    <option value="A">Desain Tata Letak Sirkuit
                                                                        Terpadu
                                                                    </option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="tbTahun" class="col-sm-2 control-label">Tahun
                                                                Pelaksanaan<i style="color: red">*</i></label>
                                                            <div class="col-sm-2">


                                                                <select
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$ddlTahunHKI"
                                                                    id="ddlTahunHKI" class="form-control select2">
                                                                    <option value="0000">--Pilih--</option>
                                                                    <option value="2021">2021</option>
                                                                    <option value="2020">2020</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2005">2005</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="tbNoPendaftaran" class="col-sm-2 control-label">No.
                                                                Pendaftaran<i style="color: red">*</i></label>
                                                            <div class="col-sm-4">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$tbNoPendaftaran"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_tbNoPendaftaran"
                                                                    class="form-control"
                                                                    placeholder="Nomor Pendaftaran">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="rblStatusHKI" class="col-sm-2 control-label">
                                                                Status<i style="color: red">*</i>
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbStatusHKI"
                                                                   class="fa fa-info-circle badge-top-left"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbStatusHKI','')"
                                                                   style="color:Navy;font-weight:bold;font-style:italic;"></a></label>
                                                            <div class="col-sm-8">
                                                                <table
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_rblStatusHKI"
                                                                    class="radio-button-list">
                                                                    <tbody>
                                                                    <tr>
                                                                        <td><input
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_hki_rblStatusHKI_0"
                                                                                type="radio"
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$rblStatusHKI"
                                                                                value="1"
                                                                                onclick="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$rblStatusHKI$0\',\'\')', 0)"><label
                                                                                for="ContentPlaceHolder1_ctl00_cvKetua_hki_rblStatusHKI_0">Terdaftar</label>
                                                                        </td>
                                                                        <td><input
                                                                                id="ContentPlaceHolder1_ctl00_cvKetua_hki_rblStatusHKI_1"
                                                                                type="radio"
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$rblStatusHKI"
                                                                                value="2"
                                                                                onclick="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$rblStatusHKI$1\',\'\')', 0)"><label
                                                                                for="ContentPlaceHolder1_ctl00_cvKetua_hki_rblStatusHKI_1">Granted
                                                                                / Bersertifikat</label></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="tbNomorHKI" class="col-sm-2 control-label">
                                                                No. HKI<i style="color: red">*</i>
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbNoHKI"
                                                                   class="fa fa-info-circle badge-top-left"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbNoHKI','')"
                                                                   style="color:Navy;font-weight:bold;font-style:italic;"></a></label>
                                                            <div class="col-sm-4">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$tbNomorHKI"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_tbNomorHKI"
                                                                    disabled="disabled"
                                                                    class="aspNetDisabled form-control"
                                                                    placeholder="Nomor HKI">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="row col-sm-12" style="padding-bottom: 5px;">
                                                            <label for="tbURLHKI" class="col-sm-2 control-label">
                                                                URL<i style="color: red">**</i>
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbURLHKI"
                                                                   class="fa fa-info-circle badge-top-left"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbURLHKI','')"
                                                                   style="color:Navy;font-weight:bold;font-style:italic;"></a></label>
                                                            <div class="col-sm-10">
                                                                <input
                                                                    name="ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$tbURLHKI"
                                                                    type="text"
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_tbURLHKI"
                                                                    class="form-control" placeholder="URL Dokumen HKI">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="fileUpload1" class="control-label">
                                                            <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbUnggahDokHKI"
                                                               class="btn btn-primary" data-toggle="tooltip"
                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbUnggahDokHKI','')">
                                                                <i class="fa fa-upload"></i>
                                                            </a>
                                                            Unggah Dokumen (PDF) Maksimal 1MB<i
                                                                style="color: red">**</i>
                                                            <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbUploadHKI"
                                                               class="fa fa-info-circle badge-top-left"
                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbUploadHKI','')"
                                                               style="color:Navy;font-weight:bold;font-style:italic;"></a>
                                                        </label>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div style="float: left;">
                                                                <label for="keterangan" class="control-label"
                                                                       style="font-size: 10px;">
                                                                    * Harus Diisi<br>
                                                                    ** Isi Salah Satu atau Isi Semua
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div
                                                                style="margin-top: 10px; float: right; border-top: solid 1px; padding-top: 5px;">
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbBatalHKI"
                                                                   class="btn btn-outline-info btn-sm"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbBatalHKI','')">Batal</a>
                                                                <a id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbSimpan"
                                                                   class="btn btn-outline-info btn-sm"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbSimpan','')">Simpan</a>
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
                                                            Data</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Apakah yakin akan menghapus data
                                                        &nbsp;<span
                                                            id="ContentPlaceHolder1_ctl00_cvKetua_hki_lblJudulHKI"></span>&nbsp;?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Batal
                                                        </button>
                                                        <a onclick="$('#modalHapus').modal('hide');"
                                                           id="ContentPlaceHolder1_ctl00_cvKetua_hki_lbHapus"
                                                           class="btn btn-info pull-right"
                                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$hki$lbHapus','')">Hapus</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-success" id="modalInfo" role="dialog"
                                             aria-labelledby="mymodalInfo">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>

                                                    </div>
                                                    <div class="modal-body">
                                                        Hak Kekayaan Intelektual (HKI), berupa Hak Cipta maupun Hak
                                                        Kekayaan Industrial (Paten, Desain Industri, Desain Tata Letak
                                                        Sirkuit Terpadu, Merek, Rahasia Dagang dan
                                                        PerlindunganVarietasTanaman).
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-success" id="modalInfoStsHKI" role="dialog"
                                             aria-labelledby="mymodalInfoStsHKI">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Jika status Granted nomor HKI harus diisi
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-success" id="modalInfoNoHKI" role="dialog"
                                             aria-labelledby="mymodalInfoNoHKI">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Dapat/Harus diisi jika status Granted
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-success" id="modalInfoURL" role="dialog"
                                             aria-labelledby="mymodalInfoURL">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        URL diisi jika tidak ada dokumen HKI yang diunggah, atau URL
                                                        diisi dan unggah dokumen HKI
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal modal-success" id="modalInfoUpload" role="dialog"
                                             aria-labelledby="mymodalInfoUpload">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Unggah dokumen HKI jika tidak mengisi URL, atau unggah dokumen
                                                        HKI dan mengisi URL HKI. Format file PDF dengan ukuran maksimal
                                                        1 MB
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalUnggahDokHKI" tabindex="-1" role="dialog"
                                             aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="false"
                                             style="background-color: rgba(0, 0, 0, 0.5);">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card border border-info">

                                                                    <div class="card-header">
                                                                        <h2><i></i>&nbsp;&nbsp;Unggah Dokumen HKI</h2>
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
                                                                                Ekstensi: pdf, PDF.
                                                                            </div>
                                                                            <div
                                                                                style="font-size: 14px; padding: 10px;">
                                                                                Maksimal: 1MB.<br>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="modal-footer">
                                                                <input name="hid_id_identitas_jurnal"
                                                                       id="hid_id_identitas_jurnal" type="hidden">

                                                                <button
                                                                    id="ContentPlaceHolder1_ctl00_cvKetua_hki_selesai"
                                                                    class="btn btn-info" data-dismiss="modal">
                                                                    <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Selesai
                                                                </button>
                                                            </div>

                                                        </div>


                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-xl-8">
                                                <table class="table m-0">
                                                    <tbody>
                                                    <tr>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div>
                                            <a id="ContentPlaceHolder1_ctl00_cvKetua_lbKembaliHki"
                                               class="btn btn-info waves-effect"
                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$cvKetua$lbKembaliHki','')">Kembali</a>
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
