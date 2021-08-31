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


                                <!-- Progress wizard -->
                                <div class="card-header col-md-12" style="text-align: right;">
                                    <a id="ContentPlaceHolder1_ctl00_lbIdentitas1"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbIdentitas1','')"
                                       style="color:Green;">
                                        Identitas Usulan
                                    </a>
                                    <a id="ContentPlaceHolder1_ctl00_lbIdentitas2" class="btn btn-success"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbIdentitas2','')"
                                       style="border-radius: 50%;">1</a>

                                    <span style="width: 100px;"></span>
                                    <a id="ContentPlaceHolder1_ctl00_lbSubstansi1"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbSubstansi1','')"
                                       style="color:Gray;margin-left: 25px;">
                                        Substansi Usulan
                                    </a>
                                    <a id="ContentPlaceHolder1_ctl00_lbSubstansi2" class="btn btn-outline-primary"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbSubstansi2','')"
                                       style="border-radius: 50%;">2</a>

                                    <span style="width: 100px;"></span>
                                    <a id="ContentPlaceHolder1_ctl00_lbRab1"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbRab1','')"
                                       style="color:Gray;margin-left: 25px;">
                                        RAB
                                    </a>
                                    <a id="ContentPlaceHolder1_ctl00_lbRab2" class="btn btn-outline-primary"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbRab2','')"
                                       style="border-radius: 50%;">3</a>

                                    <span style="width: 100px;"></span>
                                    <a id="ContentPlaceHolder1_ctl00_lbDokPendukung1"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbDokPendukung1','')"
                                       style="color:Gray;margin-left: 25px;">
                                        Dokumen Pendukung
                                    </a>
                                    <a id="ContentPlaceHolder1_ctl00_lbDokPendukung2" class="btn btn-outline-primary"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbDokPendukung2','')"
                                       style="border-radius: 50%;">4</a>
                                    <span style="width: 100px;"></span>
                                    <a id="ContentPlaceHolder1_ctl00_lbKirimUsulan1"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbKirimUsulan1','')"
                                       style="color:Gray;margin-left: 25px;">
                                        Kirim Usulan
                                    </a>
                                    <a id="ContentPlaceHolder1_ctl00_lbKirimUsulan2" class="btn btn-outline-primary"
                                       href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbKirimUsulan2','')"
                                       style="border-radius: 50%;">5</a>

                                </div>


                                <!-- Isian Usulan baru-->
                                <div>
                                    <div id="ContentPlaceHolder1_ctl00_panelUsulan">


                                        <!-- 1.1 -->
                                        <div class="card-body"
                                        ">

                                        <div id="ContentPlaceHolder1_ctl00_IdentitasUsulan_upIdentitasUsulan">

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="panel panel-default m-t-20">
                                                        <div class="card-header bg-default txt-white">
                                                            Identitas Usulan Penelitian
                                                        </div>
                                                        <div class="card-body p-15">
                                                            <div class="row">
                                                                <div class="form-group row row" style="width: 100%" ;>
                                                                    <label
                                                                        class=" col-sm-2 col-form-label
                                                                     form-control-label
                                                                ">Judul</label>
                                                                    <div class="col-sm-10">
                                                                            <textarea
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$tbJudul"
                                                                                rows="3" cols="20"
                                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_tbJudul"
                                                                                class="form-control"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row row" style="width: 100%">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">TKT
                                                                        saat ini</label>
                                                                    <div class="col-sm-3">
                                                                        <div class="input-group">

                                                                            <input
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$tbLevelTKT"
                                                                                type="text"
                                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_tbLevelTKT"
                                                                                class="form-control" disabled="">
                                                                            <span class="input-group-btn"
                                                                                  id="btn-addon2">
                                            <input type="submit"
                                                   name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$btnUkurTKT"
                                                   value="Ukur"
                                                   id="ContentPlaceHolder1_ctl00_IdentitasUsulan_btnUkurTKT"
                                                   class="btn btn-warning shadow-none addon-btn waves-effect waves-light">
                                        </span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row row" style="width: 100%">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Target
                                                                        Akhir TKT</label>
                                                                    <div class="col-sm-2">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlTargetTKT"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlTargetTKT"
                                                                            class="form-control">
                                                                            <option selected="selected" value="-1">
                                                                                Pilih Level
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row m-t-10 m-b-20">
                                                            <div class="col-sm-12 text-center">
                                                                <a id="ContentPlaceHolder1_ctl00_IdentitasUsulan_lbSimpan"
                                                                   class="btn btn-primary"
                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$lbSimpan','')">Simpan</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="panel panel-default m-t-20">
                                                        <div class="card-header bg-default txt-white">
                                                            Pemilihan Skema Penelitian
                                                        </div>
                                                        <div class="card-body p-15">
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Kategori
                                                                        Penelitian</label>
                                                                    <div class="col-sm-10">
                                                                            <span
                                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian"
                                                                                disabled="disabled"
                                                                                class="aspNetDisabled"><span
                                                                                    class="aspNetDisabled"><input
                                                                                        id="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_0"
                                                                                        type="radio"
                                                                                        name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$rblKategoriPenelitian"
                                                                                        value="2" checked="checked"
                                                                                        disabled="disabled"><label
                                                                                        for="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_0">Kompetitif Nasional</label></span><span
                                                                                    class="aspNetDisabled"><input
                                                                                        id="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_1"
                                                                                        type="radio"
                                                                                        name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$rblKategoriPenelitian"
                                                                                        value="1" disabled="disabled"
                                                                                        onclick="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$rblKategoriPenelitian$1\',\'\')', 0)"><label
                                                                                        for="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_1">Desentralisasi</label></span><span
                                                                                    class="aspNetDisabled"><input
                                                                                        id="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_2"
                                                                                        type="radio"
                                                                                        name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$rblKategoriPenelitian"
                                                                                        value="6" disabled="disabled"
                                                                                        onclick="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$rblKategoriPenelitian$2\',\'\')', 0)"><label
                                                                                        for="ContentPlaceHolder1_ctl00_IdentitasUsulan_rblKategoriPenelitian_2">Penugasan</label></span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Skema
                                                                        Penelitian</label>
                                                                    <div class="col-sm-10 col-xs-12">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlSkemaPenelitian"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlSkemaPenelitian\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlSkemaPenelitian"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Skema Kegiatan --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Rumpun
                                                                        Ilmu</label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlRumpunIlmuLevel1"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlRumpunIlmuLevel1\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlRumpunIlmuLevel1"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Rumpun Ilmu Level 1 --
                                                                            </option>
                                                                            <option
                                                                                value="52152b9a-cdcf-4e37-b0bd-9008e637218b">
                                                                                AGAMA DAN FILSAFAT
                                                                            </option>
                                                                            <option
                                                                                value="7dd3b11c-c94b-462a-a2a4-982a5236242f">
                                                                                ILMU BAHASA
                                                                            </option>
                                                                            <option
                                                                                value="4830ed02-539a-4032-b47e-5f7ddf7b2ff9">
                                                                                ILMU EKONOMI
                                                                            </option>
                                                                            <option
                                                                                value="7cebe851-2ddd-4672-9e94-e236833ed3c2">
                                                                                ILMU HEWANI
                                                                            </option>
                                                                            <option
                                                                                value="37a16395-e028-4eac-9a23-9eb805f259b9">
                                                                                ILMU KEDOKTERAN
                                                                            </option>
                                                                            <option
                                                                                value="c7e22bcc-ab99-4ebc-b0d7-4afe1be845b8">
                                                                                ILMU KESEHATAN
                                                                            </option>
                                                                            <option
                                                                                value="d11adf34-c3cc-4207-991d-5a5091473872">
                                                                                ILMU PENDIDIKAN
                                                                            </option>
                                                                            <option
                                                                                value="5935ccd3-eea5-4cf4-9ff7-44e0d6573d9f">
                                                                                ILMU SENI, DESAIN DAN MEDIA
                                                                            </option>
                                                                            <option
                                                                                value="82e9cdda-4872-4817-96c3-5f6ab8946060">
                                                                                ILMU SOSIAL HUMANIORA
                                                                            </option>
                                                                            <option
                                                                                value="38c80ec7-d058-4f15-ae4b-3ca59304cd16">
                                                                                ILMU TANAMAN
                                                                            </option>
                                                                            <option
                                                                                value="1eceab98-c1a8-42bf-91cd-6722d075fc75">
                                                                                ILMU TEKNIK
                                                                            </option>
                                                                            <option
                                                                                value="783af81d-838e-43f2-928a-12926863fcea">
                                                                                MATEMATIKA DAN ILMU PENGETAHUAN ALAM
                                                                                (MIPA)
                                                                            </option>
                                                                            <option
                                                                                value="d089dc97-fd41-4d92-9295-29b6a3dcd8b7">
                                                                                RUMPUN ILMU LAINNYA
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlRumpunIlmuLevel2"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlRumpunIlmuLevel2\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlRumpunIlmuLevel2"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Rumpun Ilmu Level 2 --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label"></label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlRumpunIlmuLevel3"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlRumpunIlmuLevel3"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Rumpun Ilmu Level 3 --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Standar
                                                                        Biaya Keluaran (SBK)</label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlSBK"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlSBK\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlSBK"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih SBK --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Bidang
                                                                        Fokus Penelitian</label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlBidangFokus"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlBidangFokus\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlBidangFokus"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Bidang Fokus --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Bidang
                                                                        Fokus PRN</label>
                                                                    <div class="col-sm-10">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlBidangFokusPRN"
                                                                            onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlBidangFokusPRN\',\'\')', 0)"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlBidangFokusPRN"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                -- Pilih Bidang Fokus PRN --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div
                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_panelTopikPenelitian">

                                                                <div class="row">
                                                                    <div class="form-group row" style="width: 100%;">
                                                                        <label
                                                                            class="col-sm-2 col-form-label form-control-label">Tema
                                                                            Penelitian</label>
                                                                        <div class="col-sm-10">
                                                                            <select
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlTemaPenelitian"
                                                                                onchange="javascript:setTimeout('__doPostBack(\'ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlTemaPenelitian\',\'\')', 0)"
                                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlTemaPenelitian"
                                                                                disabled="disabled"
                                                                                class="aspNetDisabled form-control">
                                                                                <option selected="selected"
                                                                                        value="-1">-- Pilih Tema
                                                                                    Penelitian --
                                                                                </option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group row" style="width: 100%;">
                                                                        <label
                                                                            class="col-sm-2 col-form-label form-control-label">Topik
                                                                            Penelitian</label>
                                                                        <div class="col-sm-10">
                                                                            <select
                                                                                name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlTopikPenelitian"
                                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlTopikPenelitian"
                                                                                disabled="disabled"
                                                                                class="aspNetDisabled form-control">
                                                                                <option selected="selected"
                                                                                        value="-1">-- Pilih Topik
                                                                                    Penelitian --
                                                                                </option>

                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="row">

                                                                <div class="form-group row" style="width: 100%;">
                                                                    <label
                                                                        class="col-sm-2 col-form-label form-control-label">Lama
                                                                        Kegiatan</label>
                                                                    <div class="col-sm-2">
                                                                        <select
                                                                            name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$ddlLamaKegiatan"
                                                                            id="ContentPlaceHolder1_ctl00_IdentitasUsulan_ddlLamaKegiatan"
                                                                            disabled="disabled"
                                                                            class="aspNetDisabled form-control">
                                                                            <option selected="selected" value="-1">
                                                                                --
                                                                            </option>

                                                                        </select>
                                                                    </div>
                                                                    <div
                                                                        class="col-sm-1 col-form-label form-control-label">
                                                                        Tahun
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modalTKT" tabindex="-1" role="dialog"
                                                 aria-labelledby="staticModalLabel" aria-hidden="true"
                                                 data-backdrop="false"
                                                 style="background-color: rgba(0, 0, 0, 0.5);">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Perhitungan TKT</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div
                                                                id="ContentPlaceHolder1_ctl00_IdentitasUsulan_tkt_upTKT">


                                                                <div class="panel panel-default"
                                                                     style="margin-bottom:50px;">
                                                                    <div class="card-header bg-default txt-white">
                                                                        Teknologi yang dikembangkan dalam riset yang
                                                                        akan diukur TKT-nya
                                                                    </div>
                                                                    <div class="card-body p-15">
                                                                        <div class="col-sm-12 text-center">
                                                                                <textarea
                                                                                    name="ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$tkt$tbTeknologi"
                                                                                    rows="2" cols="20"
                                                                                    id="ContentPlaceHolder1_ctl00_IdentitasUsulan_tkt_tbTeknologi"
                                                                                    class="form-control"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="panel panel-default">
                                                                    <div class="card-header bg-default txt-white">
                                                                        Kategori Indikator TKT
                                                                    </div>
                                                                    <div class="card-body p-30">

                                                                        <div class="row m-t-10 m-b-20">
                                                                            <div class="col-sm-12 text-center">
                                                                                <a id="ContentPlaceHolder1_ctl00_IdentitasUsulan_tkt_lbGetKategori"
                                                                                   class="btn btn-primary"
                                                                                   href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$IdentitasUsulan$tkt$lbGetKategori','')">Pilih</a>
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

                                    </div>
                                    <div class="card-footer col-md-12" style="text-align: right;">
                                        <a id="ContentPlaceHolder1_ctl00_lbLanjutkanAtIDUsulan"
                                           class="btn btn-success"
                                           href="javascript:__doPostBack('ctl00$ContentPlaceHolder1$ctl00$lbLanjutkanAtIDUsulan','')">
                                            <i class="fa fa-chevron-right"></i>&nbsp;&nbsp;Lanjutkan
                                        </a>
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
