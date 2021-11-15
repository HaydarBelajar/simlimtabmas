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
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-sm-12 pull-left">
                                        <span id="ContentPlaceHolder1_ctl00_lblJudulHeader"
                                              style="font-size:Larger;font-weight:bold;">LAPORAN KEMAJUAN</span>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <span id="ContentPlaceHolder1_ctl00_lblSkemaIsian" style="font-weight:bold;">Penelitian Dosen Pemula</span>
                                        &nbsp;<b>| Tahun Pelaksanaan</b>&nbsp;
                                        <span id="ContentPlaceHolder1_ctl00_lblThnPelaksanaanIsian"
                                              style="font-weight:bold;">2019</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        Tahun ke:&nbsp;
                                        <span id="ContentPlaceHolder1_ctl00_lblTahunKeIsian"
                                              style="font-weight:bold;">1</span>
                                        &nbsp;dari&nbsp;
                                        <span id="ContentPlaceHolder1_ctl00_lblDurasiIsian"
                                              style="font-weight:bold;">1</span>
                                        &nbsp;tahun
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10 pull-left" style="text-align: left;">
                                        <span id="ContentPlaceHolder1_ctl00_lblJudulIsian" style="color:Green;">PENGARUH DEEP BACK DAN RUBBING MASSAGE TERHADAP PENURUNAN INTENSITAS NYERI DAN PERCEPATAN  PEMBUKAAN SERVIKS IBU BERSALIN DI BPM KABUPATEN SLEMAN</span>
                                    </div>
                                    <div class="col-sm-2 pull-right" style="text-align: right;">
                                        <a id="ContentPlaceHolder1_ctl00_lbKembaliIsian"
                                           class="btn btn-primary waves-effect waves-light"
                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbKembaliIsian','')">
                                            <span class="m-l-10">Kembali</span>
                                        </a>
                                    </div>
                                </div>
                            </fieldset>

                            <div id="ContentPlaceHolder1_ctl00_upLapKemajuan">


                                <fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card">
                                                <div class="card-body accordion">
                                                    <div class="color-accordion ui-accordion ui-widget ui-helper-reset"
                                                         id="sclae-accordion" role="tablist">
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-state-default ui-accordion-header-active ui-state-active ui-accordion-icons"
                                                           role="tab" id="ui-id-1" aria-controls="ui-id-2"
                                                           aria-selected="true" aria-expanded="true" tabindex="0"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-up"></span>Ringkasan</a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active"
                                                            id="ui-id-2" aria-labelledby="ui-id-1" role="tabpanel"
                                                            aria-hidden="false" style="display: block;">
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <p>
                                                                        Tuliskan secara ringkas latar belakang
                                                                        penelitian, tujuan dan tahapan metode
                                                                        penelitian, luaran yang ditargetkan, uraian TKT
                                                                        penelitian dan hasil penelitian yang diperoleh
                                                                        sesuai dengan tahun pelaksanaan penelitian.
                                                                    </p>
                                                                    <textarea
                                                                        name="ctl00$ContentPlaceHolder1$ctl00$tbRingkasan"
                                                                        rows="10" cols="20"
                                                                        id="ContentPlaceHolder1_ctl00_tbRingkasan"
                                                                        class="form-control max-textarea"
                                                                        style="width:100%;">Latar belakang penelitian Menurut Lestari (2012) dalam penelitiannya terhadap 2.700 parturien di 121 pusat obstetrik dari 36 negara menemukan bahwa hanya 15% persalinan yang berlangsung tanpa nyeri atau nyeri ringan, 35% persalinan disertai nyeri sedang, 30% persalinan disertai nyeri hebat dan 20% persalinan disertai nyeri yang sangat hebat. Teknik pijatan yang dapat dilakukan adalah deep back dan rubbing massage. Tujuan dari  penelitian adalah mengetahui pengaruh deep back dan rubbing massage terhadap penurunan intensitas nyeri persalinan dan percepatan pembukaan serviks pada ibu bersalin. Sampel dalam penelitian ada 40 sampel, 20 kelompok intervensi dan 20 kelompok kontrol. Tahapan metode penelitian menggunakan rancangan kuantitatif dengan quasy experimental design dengan desain non-randomized pretest-posttes group. Uji beda hasil  pre test dan post test pada kelompok eksperimen atau non eksperimen menggunakan analisis T-test untuk mengetahui perbedaan pre test dan post test pada 2 kelompok yang berbeda yaitu kelompok intervensi dan kelompok kontrol. Target luaran luaran wajib : artikel dimasukkan dalam jurnal kebidanan Universitas Muhammadiyah Semarang Terbit bulan Agustus 2021 volume 2, luaran tambahan vidio  deep back dan rubbing massage dan poster sudah di HKI kan serta publikasi prosiding dalam pertemuan ilmiah Internasional. Tingkat kesiapan teknologi dalam penelitian ini adalah tingkat 2 dengan teknologi deep back dan rubbing massage.</textarea>
                                                                </div>
                                                            </fieldset>
                                                            <div class="row text-right">
                                                                <a id="ContentPlaceHolder1_ctl00_lbSimpanRingkasan"
                                                                   class="btn btn-success waves-effect waves-light"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbSimpanRingkasan','')">Simpan</a>
                                                            </div>
                                                        </div>
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                           role="tab" id="ui-id-3" aria-controls="ui-id-4"
                                                           aria-selected="false" aria-expanded="false"
                                                           tabindex="-1"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>Keyword</a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                            id="ui-id-4" aria-labelledby="ui-id-3" role="tabpanel"
                                                            aria-hidden="true" style="display: none;">
                                                            <fieldset class="form-group">
                                                                <div class="row">
                                                                    <p>
                                                                        Maksimal 5 kata kunci. Gunakan tanda baca titik
                                                                        koma (;) sebagai pemisah
                                                                    </p>
                                                                    <textarea
                                                                        name="ctl00$ContentPlaceHolder1$ctl00$tbKeyword"
                                                                        rows="1" cols="20"
                                                                        id="ContentPlaceHolder1_ctl00_tbKeyword"
                                                                        class="form-control max-textarea"
                                                                        style="width:100%;">deep back dan rubbing massage, nyeri dan pembukaan serviks</textarea>
                                                                </div>
                                                            </fieldset>
                                                            <div class="row text-right">
                                                                <a id="ContentPlaceHolder1_ctl00_lbSimpanKeyword"
                                                                   class="btn btn-success waves-effect waves-light"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbSimpanKeyword','')">Simpan</a>
                                                            </div>
                                                        </div>
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                           role="tab" id="ui-id-5" aria-controls="ui-id-6"
                                                           aria-selected="false" aria-expanded="false"
                                                           tabindex="-1"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>Substansi
                                                            Laporan</a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                            id="ui-id-6" aria-labelledby="ui-id-5" role="tabpanel"
                                                            aria-hidden="true" style="display: none;">
                                                            <p>
                                                                <span id="ContentPlaceHolder1_ctl00_lblInfo1FormUnggah">Unggah dokumen substansi laporan kemajuan dalam format PDF sesuai dengan template yang disediakan</span>
                                                            </p>
                                                            <div class="row">
                                                                <div class="col-lg-7">
                                                                    <table>
                                                                        <tbody>
                                                                        <tr>
                                                                            <td>
                                                                                <a id="ContentPlaceHolder1_ctl00_lbUnduhTemplateDok2"
                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbUnduhTemplateDok2','')"
                                                                                   style="font-weight:bold;">
                                                                                    <i class="fa fa-file-word-o"
                                                                                       style="font-size: 60px; color: blue;"></i>
                                                                                </a>
                                                                            </td>
                                                                            <td style="padding-left: 5px;">

                                                                                <a id="ContentPlaceHolder1_ctl00_lbUnduhTemplateDok"
                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbUnduhTemplateDok','')"
                                                                                   style="font-weight:bold;">Unduh
                                                                                    Template</a>

                                                                            </td>
                                                                            <td style="padding-left: 10px;">

                                                                                <a id="ContentPlaceHolder1_ctl00_lbUnduhPdfDok"
                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbUnduhPdfDok','')"
                                                                                   style="color:Red;">
                                                                                    <i class="fa fa-file-pdf-o"
                                                                                       style="font-size: 50px; "></i>
                                                                                </a>
                                                                            </td>


                                                                            <td>
                                                                                <b>
                                                                                    <span
                                                                                        id="ContentPlaceHolder1_ctl00_lblInfo2FormUnggah">Dokumen substansi laporan kemajuan</span>
                                                                                    <span>&nbsp;<span
                                                                                            id="ContentPlaceHolder1_ctl00_lblStsUnggah"
                                                                                            style="color:Blue;">(Sudah diunggah)</span>
                                                                                </span>
                                                                                </b>


                                                                                <div>
                                                                                    <div style="padding: 10px;">
                                                                                        <div>
                                                                                            <div
                                                                                                class="input-group input-group-button input-group-primary">
                                                                                                <input type="file"
                                                                                                       name="ctl00$ContentPlaceHolder1$ctl00$fileUpload1"
                                                                                                       id="ContentPlaceHolder1_ctl00_fileUpload1"
                                                                                                       class="form-control">
                                                                                                <span
                                                                                                    class="input-group-btn">
                                                                                                <a id="ContentPlaceHolder1_ctl00_lbUnggahDokumen"
                                                                                                   class="btn btn-info"
                                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbUnggahDokumen','')">
                                                                        <i class="fa fa-cloud-upload">&nbsp;Unggah</i></a>
                                                                                            </span>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div>
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_lblInfo"
                                                                                                style="color:Red;font-weight:bold;"></span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div>
                                                                                <span
                                                                                    style="font-size: 14px; padding: 10px; color: red; font-style: italic;">Ukuran File Maksimal 5 MB dengan format PDF
                                                                                </span>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="col-lg-5">
                                                                    <span id="ContentPlaceHolder1_ctl00_lblErrorInfo"
                                                                          style="color:Red;"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                           role="tab" id="ui-id-7" aria-controls="ui-id-8"
                                                           aria-selected="false" aria-expanded="false"
                                                           tabindex="-1"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>Luaran
                                                            Wajib

                                                        </a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                            id="ui-id-8" aria-labelledby="ui-id-7" role="tabpanel"
                                                            aria-hidden="true" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12 table-responsive">
                                                                            <div>
                                                                                <table
                                                                                    class="table table-striped table-hover"
                                                                                    cellspacing="0"
                                                                                    id="ContentPlaceHolder1_ctl00_gvLuaranWajib"
                                                                                    style="border-collapse:collapse;">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td align="center" valign="top"
                                                                                            style="width:30px;">
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranWajib_lblNo_0">1</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:300px;">
                                                                                        <span
                                                                                            id="ContentPlaceHolder1_ctl00_gvLuaranWajib_lblJenisLuaran_0">Publikasi ilmiah
 - Publikasi Ilmiah Jurnal Nasional Tidak Terakreditasi</span><br>
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranWajib_lblTargetLuaran_0"
                                                                                                style="color:Green;">accepted/published</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">

                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">
                                                                                            <a id="ContentPlaceHolder1_ctl00_gvLuaranWajib_lbEdit_0"
                                                                                               title="Edit"
                                                                                               class="btn btn-primary btn-sm"
                                                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLuaranWajib$ctl02$lbEdit','')"
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
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                           role="tab" id="ui-id-9" aria-controls="ui-id-10"
                                                           aria-selected="false" aria-expanded="false"
                                                           tabindex="-1"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>Luaran
                                                            Tambahan</a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                            id="ui-id-10" aria-labelledby="ui-id-9" role="tabpanel"
                                                            aria-hidden="true" style="display: none;">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-12 table-responsive">
                                                                            <div>
                                                                                <table
                                                                                    class="table table-striped table-hover"
                                                                                    cellspacing="0"
                                                                                    id="ContentPlaceHolder1_ctl00_gvLuaranTambahan"
                                                                                    style="border-collapse:collapse;">
                                                                                    <tbody>
                                                                                    <tr>
                                                                                        <td align="center" valign="top"
                                                                                            style="width:30px;">
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblNo_0">1</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:300px;">
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblJenisLuaran_0">Artikel ilmiah dimuat di prosiding (Pemakalah) - Prosiding dalam pertemuan ilmiah Internasional</span><br>
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblTargetLuaran_0"
                                                                                                style="color:Green;">sudah terbit/sudah dilaksanakan</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">

                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">
                                                                                            <a id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lbEdit_0"
                                                                                               title="Edit"
                                                                                               class="btn btn-primary btn-sm"
                                                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLuaranTambahan$ctl02$lbEdit','')"
                                                                                               style="font-size:Medium;">
                                                                                                <i class="fa fa-pencil"></i>
                                                                                            </a>

                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" valign="top"
                                                                                            style="width:30px;">
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblNo_1">2</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:300px;">
                                                                                        <span
                                                                                            id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblJenisLuaran_1">Hak Kekayaan Intelektual (HKI)
 - Hak Cipta</span><br>
                                                                                            <span
                                                                                                id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lblTargetLuaran_1"
                                                                                                style="color:Green;">granted</span>
                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">

                                                                                        </td>
                                                                                        <td align="left" valign="top"
                                                                                            style="width:50px;">
                                                                                            <a id="ContentPlaceHolder1_ctl00_gvLuaranTambahan_lbEdit_1"
                                                                                               title="Edit"
                                                                                               class="btn btn-primary btn-sm"
                                                                                               href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$gvLuaranTambahan$ctl03$lbEdit','')"
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
                                                        <a class="accordion-msg ui-accordion-header ui-corner-top ui-accordion-header-collapsed ui-corner-all ui-state-default ui-accordion-icons"
                                                           role="tab" id="ui-id-11" aria-controls="ui-id-12"
                                                           aria-selected="false" aria-expanded="false"
                                                           tabindex="-1"><span
                                                                class="ui-accordion-header-icon ui-icon zmdi zmdi-chevron-down"></span>Realisasi
                                                            Keterlibatan/Kontribusi Mitra</a>
                                                        <div
                                                            class="accordion-desc ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content"
                                                            id="ui-id-12" aria-labelledby="ui-id-11" role="tabpanel"
                                                            aria-hidden="true" style="display: none;">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <div class="modal fade " id="modalLuaran" tabindex="-1" aria-labelledby="modalTitle"
                                     aria-hidden="true" data-backdrop="false"
                                     style="background-color: rgba(0, 0, 0, 0.5);">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <h4 class="modal-title" id="modalTitle">
                                                            <span id="ContentPlaceHolder1_ctl00_lblModalTitle"
                                                                  style="color:Blue;font-weight:bold;">Luaran Wajib</span>
                                                        </h4>
                                                    </div>
                                                    <div class="col-lg-2 text-right">
                                                        <a href="#" data-dismiss="modal" class="close"
                                                           style="color: red;">
                                                            <i class="fa fa-close"></i>
                                                        </a>
                                                        <div id="ContentPlaceHolder1_ctl00_UpdateProgress1"
                                                             style="display:none;" role="status" aria-hidden="true">

                                                            <div class="modal_loading">
                                                                <div class="text-right">
                                                                    <i class="fa fa-refresh fa-spin fa-2x"></i>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-body">

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
