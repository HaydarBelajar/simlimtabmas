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
                        <form action="{{ $page == 'edit' ? route('pengabdian.update-pengabdian') :
                            route('pengabdian.simpan-pengabdian') }}" method="POST">
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
                                                <option {{ isset($detailPengabdian['tahun_id']) &&
                                                    ($detailPengabdian['tahun_id']==$tahun['tahun_id']) ? 'selected'
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
                                                <option {{ isset($detailPengabdian['tahun_pelaksanaan_id']) &&
                                                    ($detailPengabdian['tahun_pelaksanaan_id']==$tahun['tahun_id'])
                                                    ? 'selected' : '' }} value={{ $tahun['tahun_id'] }}>{{
                                                    $tahun['tahun'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="fakultas-pengabdian"
                                            class="col-sm-2 col-form-label">Fakultas</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="fakultas-pengabdian" name="fakultas_id"
                                                required>
                                                @foreach ($listFakultas as $fakultas)
                                                <option {{ isset($detailPengabdian['fakultas_id']) &&
                                                    ($detailPengabdian['fakultas_id']==$fakultas['kdfakultas'])
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
                                            <select class="form-control select2" id="program-studi" name="program_studi"
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
                                        <label for="skema-pengabdian" class="col-sm-2 col-form-label">Skema</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="skema-pengabdian" name="skema_id" required>
                                                @foreach ($listSkema as $skema)
                                                <option {{ isset($detailPengabdian['skema_id']) &&
                                                    ($detailPengabdian['skema_id'] ?? 0 == $skema['skema_id']) ? 'selected'
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
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='1 Bulan' ) ? 'selected' : ''
                                                    }}>1 Bulan</option>
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='2 Bulan' ) ? 'selected' : ''
                                                    }}>2 Bulan</option>
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='3 Bulan' ) ? 'selected' : ''
                                                    }}>3 Bulan</option>
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='4 Bulan' ) ? 'selected' : ''
                                                    }}>4 Bulan</option>
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='5 Bulan' ) ? 'selected' : ''
                                                    }}>5 Bulan</option>
                                                <option {{ isset($detailPengabdian['durasi_kegiatan']) &&
                                                    ($detailPengabdian['durasi_kegiatan']=='6 Bulan' ) ? 'selected' : ''
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
                                                <option {{ isset($detailPengabdian['usulan_tahun_ke']) &&
                                                    ($detailPengabdian['usulan_tahun_ke']=='1' ) ? 'selected' : '' }}>1
                                                </option>
                                                <option {{ isset($detailPengabdian['usulan_tahun_ke']) &&
                                                    ($detailPengabdian['usulan_tahun_ke']=='2' ) ? 'selected' : '' }}>2
                                                </option>
                                                <option {{ isset($detailPengabdian['usulan_tahun_ke']) &&
                                                    ($detailPengabdian['usulan_tahun_ke']=='3' ) ? 'selected' : '' }}>3
                                                </option>
                                                <option {{ isset($detailPengabdian['usulan_tahun_ke']) &&
                                                    ($detailPengabdian['usulan_tahun_ke']=='4' ) ? 'selected' : '' }}>4
                                                </option>
                                                <option {{ isset($detailPengabdian['usulan_tahun_ke']) &&
                                                    ($detailPengabdian['usulan_tahun_ke']=='5' ) ? 'selected' : '' }}>5
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Judul" id="judul" rows="2"
                                                name="judul"
                                                required>{{ isset($detailPengabdian['judul']) ? $detailPengabdian['judul'] : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="abstrak" id="abstrak" rows="2"
                                                name="abstrak" required>{{ isset($detailPengabdian['abstrak']) ? $detailPengabdian['abstrak'] : '' }}
                                                    </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="keywords" id="keywords" rows="2"
                                                name="keywords"
                                                required>{{ isset($detailPengabdian['keywords']) ? $detailPengabdian['keywords'] : '' }}</textarea>
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
                                            <input type="number" min="0" class="form-control" id="jumlah-sumber-dana"
                                                placeholder="Jumlah Dana" name="jumlah_sumber_dana" required
                                                value="{{ isset($detailPengabdian['jumlah_usulan_dana']) ? $detailPengabdian['jumlah_usulan_dana'] : '' }}">
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
                                        @include('admin.content.pengabdian.usulan-baru.tim-usulan')
                                    </div>
                                    {{-- <div class="top-button-group" style="margin-bottom: 20px;">
                                        <button type="button" class="btn btn-primary" id="tambah-anggota">Tambah
                                            Anggota</button>
                                    </div>
                                    <table id="anggota-pengabdian" class="table table-striped table-bordered"
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
                                $list_luaran = array_map($reduce, $detailPengabdian['list_luaran'] ?? []);
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
                            <input type="hidden" name="list_anggota_pengabdian" id="list-anggota-pengabdian"
                                value="{{ isset($anggotaPengabdianIds) ? json_encode($anggotaPengabdianIds) : '[]' }}" />
                            <input type="hidden" name="anggotaPengabdian" id="anggota-pengabdian-list"
                                value="{{ isset($anggotaPengabdian) ? json_encode($anggotaPengabdian) : '[]' }}" />
                            <input type="hidden" name="usulan_id" id="usulan-pengabdian-id"
                                value="{{ isset($detailPengabdian['usulan_id']) ? $detailPengabdian['usulan_id'] : '' }}" />
                            <input type="hidden" name="jenis_usulan" id="jenis-usulan"
                                value="{{ isset($detailPengabdian['jenis_usulan']) ? $detailPengabdian['jenis_usulan'] : 2 }}" />
                            @if (in_array('create pengabdian',$user['permission_array']))
                            <button type="submit" class="btn btn-success float-left">Simpan</button>
                            @endif
                            <a href={{ route('pengabdian.data-pengabdian') }} type="button"
                                class="btn btn-danger float-right">Kembali</a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                    <!-- modal tambah anggota pengabdian -->
                    <div id="formTambahAnggotaModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Tambah Anggota Pengabdian</h5>
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
                                                    $userPengusul['name'] }}>{{ $userPengusul['name'] }} ( {{ $userPengusul['full_name'] ?? '' }} ) </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Peranan Penelitian</label>
                                            <select class="custom-select" name="peranan-pengabdian"
                                                id="peranan-pengabdian">
                                                @foreach ($listPeranan as $peranan)
                                                <option value="{{ $peranan['peranan_id'] }}" data-nama-peranan={{
                                                    $peranan['peranan_nama'] }}>{{ $peranan['peranan_nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fakultas</label>
                                            <select class="custom-select" name="fakultas-pengabdian-anggota"
                                                id="fakultas-pengabdian-anggota">
                                                @foreach ($listFakultas as $fakultas)
                                                <option data-nama-fakultas={{ $fakultas['namafakultas'] }} value={{
                                                    $fakultas['kdfakultas'] }}>{{ $fakultas['namafakultas'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br />
                                        <div class="modal-footer">
                                            @if (in_array('create pengabdian',$user['permission_array']))
                                            <input type="hidden" name="action" id="action" value="Simpan" />
                                            <input type="submit" name="action_button" id="action_button"
                                                class="btn btn-primary" value="Add" />
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal tambah anggota pengabdian -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.content.pengabdian.usulan-baru.script')
@endsection