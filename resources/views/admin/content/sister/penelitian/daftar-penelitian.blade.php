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
    <!-- Filter -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <div class="alert alert-info" role="alert">
                        <b>Info</b> : Untuk mencari data semua dosen, cukup <b>kosongkan datanya</b> kemudian klik
                        <b>Cari</b>.
                    </div>
                    <form method="POST" action="{{ route('sister.daftar-penelitian-filter') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="namaPegawai" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nama' id="namaPegawai"
                                    value="{{ old('nama') ?? '' }}" placeholder="Nama Pegawai">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nidn" class="col-sm-2 col-form-label">NIDN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nidn' id="nidn" placeholder="NIDN"
                                    value="{{ old('nidn') ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name='nip' id="nip" placeholder="NIP"
                                    value="{{ old('nip') ?? '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" name="action_button" id="action_button" class="btn btn-primary"
                                value="Cari" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <div class="list-group">
                        @if (session()->get('dataSdm'))
                        @foreach (session()->get('dataSdm') as $sdm)
                        <a href="#" class="list-group-item list-group-item-action daftar-penelitian"
                            data-id="{{$sdm['id_sdm']}}" data-nama="{{$sdm['nama_sdm']}}">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{$sdm['nama_sdm']}}</h5>
                                <small>{{$sdm['jenis_sdm']}}</small>
                            </div>
                            <p class="mb-1">Status: {{$sdm['nama_status_aktif']}}</p>
                            <small>NIDN: {{$sdm['nidn']}}</small><br>
                            <small>NIP: {{$sdm['nip']}}</small>
                        </a>
                        @endforeach
                        @else
                        <a href="#" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">Tidak ada data</h5>
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- Modal Daftar Penelitian -->
        <div id="modalDaftarPenelitian" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg" style="max-width: 80% !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-penelitian-title">List Penelitian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="daftar-penelitian-table" class="table table-striped table-bordered"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="20%">Judul Penelitian</th>
                                    <th width="5%">Waktu Klaim BKD</th>
                                    <th width="5%">Tanggal</th>
                                    <th width="5%">Jenis Publikasi</th>
                                    <th width="10%">Kategori Kegiatan</th>
                                    <th width="10%">Asal Data</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="modal-footer">
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.Modal Upload -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '.daftar-penelitian', function() {
            $('#modalDaftarPenelitian').modal('show');
            const id = $(this).data("id")
            const nama = $(this).data("nama")

            $('#modal-penelitian-title').html(`Daftar Penelitian, ${nama}`);
        });
    });
</script>
@endpush
@endsection