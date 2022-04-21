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
                        <a href="#" class="list-group-item list-group-item-action">
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
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@push('scripts')
<script>
    $(document).ready(function () {
    });
</script>
@endpush
@endsection