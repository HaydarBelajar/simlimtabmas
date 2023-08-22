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
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <!-- we are adding the accordion ID so Bootstrap's collapse plugin detects it -->
                        <form action="{{ $page == 'edit' ? route('penelitian.update-penelitian') :
                            route('penelitian.simpan-penelitian') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ (isset($page) && $page == 'edit') ? 'edit' : 'tambah' }}">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseOne"
                                            aria-expanded="false">
                                            Identitas Usulan
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="tahun-usulan" class="col-sm-2 col-form-label">Tahun Usulan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="tahun" name="tahun_id" required>
                                                @foreach ($listTahun as $tahun)
                                                <option {{ isset($detailPenelitian['tahun_id']) &&
                                                    ($detailPenelitian['tahun_id'] ?? 0 == $tahun['tahun_id']) ? 'selected'
                                                    : '' }} value={{ $tahun['tahun_id'] }}>{{ $tahun['tahun'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="tahun-pelaksanaan" class="col-sm-2 col-form-label">Tahun
                                            Pelaksanaan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="tahun-pelaksanaan"
                                                name="tahun_pelaksanaan_id" required>
                                                @foreach ($listTahun as $tahun)
                                                <option {{ isset($detailPenelitian['tahun_pelaksanaan_id']) &&
                                                    ($detailPenelitian['tahun_pelaksanaan_id']==$tahun['tahun_id'])
                                                    ? 'selected' : '' }} value={{ $tahun['tahun_id'] }}>{{
                                                    $tahun['tahun'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fakultas-penelitian"
                                            class="col-sm-2 col-form-label">Fakultas</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" id="fakultas-penelitian" name="fakultas_id"
                                                required>
                                                @foreach ($listFakultas as $fakultas)
                                                <option {{ isset($detailPenelitian['fakultas_id']) &&
                                                    ($detailPenelitian['fakultas_id']==$fakultas['kdfakultas'])
                                                    ? 'selected' : '' }} value={{ $fakultas['kdfakultas'] }}>{{
                                                    $fakultas['namafakultas'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="program-studi"
                                            class="col-sm-2 col-form-label">Program Studi</label>
                                        <div class="col-sm-10">
                                            <select class="form-control select2" id="program-studi" name="program_studi" style="width: 100%;"
                                                required>
                                                @foreach ($listProdi as $prodi)
                                                <option {{ isset($detailPenelitian['ps_id']) &&
                                                    ($detailPenelitian['ps_id']==$prodi['ps_id'])
                                                    ? 'selected' : '' }} value={{ $prodi['ps_id'] }}>{{
                                                    $prodi['ps_name'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="skema-penelitian" class="col-sm-2 col-form-label">Skema</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="skema-penelitian" name="skema_id" required>    
                                                @foreach ($listSkema as $skema)
                                                <option {{ isset($detailPenelitian['skema_id']) &&
                                                    ($detailPenelitian['skema_id']==$skema['skema_id']) ? 'selected'
                                                    : '' }} value={{ $skema['skema_id'] }}>{{ $skema['skema_nama'] }} | Maks Biaya : Rp{{ number_format($skema['maks_biaya'] ?? '0') }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="durasi-kegiatan" class="col-sm-2 col-form-label">Durasi
                                            Kegiatan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="durasi-kegiatan" name="durasi_kegiatan"
                                                required>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='1 Bulan' ) ? 'selected' : ''
                                                    }}>1 Bulan</option>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='2 Bulan' ) ? 'selected' : ''
                                                    }}>2 Bulan</option>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='3 Bulan' ) ? 'selected' : ''
                                                    }}>3 Bulan</option>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='4 Bulan' ) ? 'selected' : ''
                                                    }}>4 Bulan</option>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='5 Bulan' ) ? 'selected' : ''
                                                    }}>5 Bulan</option>
                                                <option {{ isset($detailPenelitian['durasi_kegiatan']) &&
                                                    ($detailPenelitian['durasi_kegiatan']=='6 Bulan' ) ? 'selected' : ''
                                                    }}>6 Bulan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="usulan-tahun-ke" class="col-sm-2 col-form-label">Usulan Tahun
                                            ke</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="usulan-tahun-ke" name="usulan_tahun_ke"
                                                required>
                                                <option {{ isset($detailPenelitian['usulan_tahun_ke']) &&
                                                    ($detailPenelitian['usulan_tahun_ke']=='1' ) ? 'selected' : '' }}>1
                                                </option>
                                                <option {{ isset($detailPenelitian['usulan_tahun_ke']) &&
                                                    ($detailPenelitian['usulan_tahun_ke']=='2' ) ? 'selected' : '' }}>2
                                                </option>
                                                <option {{ isset($detailPenelitian['usulan_tahun_ke']) &&
                                                    ($detailPenelitian['usulan_tahun_ke']=='3' ) ? 'selected' : '' }}>3
                                                </option>
                                                <option {{ isset($detailPenelitian['usulan_tahun_ke']) &&
                                                    ($detailPenelitian['usulan_tahun_ke']=='4' ) ? 'selected' : '' }}>4
                                                </option>
                                                <option {{ isset($detailPenelitian['usulan_tahun_ke']) &&
                                                    ($detailPenelitian['usulan_tahun_ke']=='5' ) ? 'selected' : '' }}>5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Judul" id="judul" rows="2"
                                                name="judul"
                                                required>{{ isset($detailPenelitian['judul']) ? $detailPenelitian['judul'] : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="abstrak" id="abstrak" rows="2"
                                                name="abstrak" required>{{ isset($detailPenelitian['abstrak']) ? $detailPenelitian['abstrak'] : '' }}
                                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="keywords" id="keywords" rows="2"
                                                name="keywords"
                                                required>{{ isset($detailPenelitian['keywords']) ? $detailPenelitian['keywords'] : '' }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseThree"
                                            aria-expanded="false">
                                            Biaya Usulan
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jumlah-dana" class="col-sm-2 col-form-label">Jumlah Dana</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="jumlah-sumber-dana" min="0"
                                                placeholder="Jumlah Dana" name="jumlah_sumber_dana" required
                                                value="{{ $detailPenelitian['jumlah_usulan_dana'] ?? '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFive"
                                            aria-expanded="false">
                                            Anggota Penelitian
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
                                        Akun yang saat ini Login ke sistem harus masuk sebagai Anggota, jika tidak maka usulan tidak muncul di sistem. 
                                    </div>
                                    <div id="tim-usulan-row">
                                        @include('admin.content.penelitian.usulan-baru.tim-usulan')
                                    </div>
                                    <div class="top-button-group" style="margin-bottom: 20px;">
                                        {{-- <button type="button" class="btn btn-primary" id="tambah-anggota">Tambah Anggota</button> --}}
                                    </div>
                                    {{-- <table id="anggota-penelitian" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama</th>
                                                <th width="20%">Peran</th>
                                                <th width="20%">Fakultas</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                    </table> --}}
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseSix"
                                            aria-expanded="false">
                                            Jenis Luaran
                                        </a>
                                    </h4>
                                </div>
                                @php
                                $reduce = function($value) {
                                    return $value['capaian_luaran_id'];
                                };
                                $list_luaran = array_map($reduce, $detailPenelitian['list_luaran'] ?? []);
                                @endphp
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jenis-luaran" class="col-sm-2 col-form-label">Jenis Luaran</label>
                                        <div class="col-sm-10 select2-purple">
                                            <select class="form-control select2" id="jenis-luaran" name="jenis_luaran[]"
                                                multiple="multiple" data-dropdown-css-class="select2-purple"
                                                style="width: 100%;">
                                                @foreach ($listCapaianLuaran as $capaianLuaran)
                                                <option {{ in_array($capaianLuaran['capaian_luaran_id'], $list_luaran) ? 'selected'
                                                    : '' }} value={{ $capaianLuaran['capaian_luaran_id'] }}>{{
                                                    $capaianLuaran['capaian_luaran_nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="list_anggota_penelitian" id="list-anggota-penelitian"
                                value="{{ isset($anggotaPenelitianIds) ? json_encode($anggotaPenelitianIds) : '[]' }}" />
                            <input type="hidden" name="anggotaPenelitian" id="anggota-penelitian-list"
                                value="{{ isset($anggotaPenelitian) ? json_encode($anggotaPenelitian) : '[]' }}" />
                            <input type="hidden" name="usulan_id" id="usulan-penelitian-id"
                                value="{{ isset($detailPenelitian['usulan_id']) ? $detailPenelitian['usulan_id'] : '' }}" />
                            <input type="hidden" name="jenis_usulan" id="jenis-usulan"
                                value="{{ isset($detailPenelitian['jenis_usulan']) ? $detailPenelitian['jenis_usulan'] : 1 }}" />
                            @if (in_array('create penelitian',$user['permission_array']))
                            <button type="submit" class="btn btn-success float-left">Simpan</button>
                            @endif
                            <a href={{ route('penelitian.data-penelitian') }} type="button"
                                class="btn btn-danger float-right">Kembali</a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <!-- modal tambah anggota penelitian -->
                    {{-- <div id="formTambahAnggotaModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggota Penelitian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- <div class="alert alert-danger" role="alert">
                                          This is a danger alert—check it out!
                                        </div> -->
                                    <form method="post" id="tambah-anggota-form" class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <select class="form-control select2" id="nama-anggota" name="nama-anggota" required>
                                                @foreach ($listUserPengusul as $userPengusul)
                                                <option value={{ $userPengusul['id'] }} data-nama-pengusul={{
                                                    $userPengusul['name'] }}>{{ $userPengusul['name'] }} ( {{ $userPengusul['full_name'] ?? '' }} )</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Peranan Penelitian</label>
                                            <select class="custom-select" name="peranan-penelitian"
                                                id="peranan-penelitian">
                                                @foreach ($listPeranan as $peranan)
                                                <option value="{{ $peranan['peranan_id'] }}" data-nama-peranan={{
                                                    $peranan['peranan_nama'] }}>{{ $peranan['peranan_nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <select class="custom-select" name="fakultas-penelitian-anggota"
                                                id="fakultas-penelitian-anggota">
                                                @foreach ($listFakultas as $fakultas)
                                                <option data-nama-fakultas={{ $fakultas['namafakultas'] }} value={{
                                                    $fakultas['kdfakultas'] }}>{{ $fakultas['namafakultas'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                            @if (in_array('create penelitian',$user['permission_array']))
                                            <input type="hidden" name="action" id="action" value="Simpan" />
                                            <input type="submit" name="action_button" id="action_button"
                                                class="btn btn-primary" value="Add" />
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /.modal tambah anggota penelitian -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.content.penelitian.usulan-baru.script')
@endsection