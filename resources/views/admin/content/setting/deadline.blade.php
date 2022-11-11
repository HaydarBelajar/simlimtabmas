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
        <div class="container-fluid">
            <div class="card card-default color-palette-box">
                <div class="card-body">
                    <form method="POST" action="{{ route('setting.deadline.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="namaPegawai" class="col-sm-2 col-form-label">Batas Pengajuan</label>
                            <div class="col-md-2">
                                <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" 
                                        data-target="#reservationdatetime" 
                                        name="batas_pengajuan" 
                                        id="batas_pengajuan"
                                        value="{{ old('batas_pengajuan', \Carbon\Carbon::parse($data['date_value'] ?? '',  'Asia/Jakarta', 'Y-m-d H:i:s')->format('d-m-Y H:i:s')) }}"
                                        >
                                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <input type="submit" name="action_button" id="action_button" class="btn btn-primary"
                                value="Simpan" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@push('scripts')
<script>
    $(document).ready(function () {
        //Date and time picker
        $('#reservationdatetime').datetimepicker({ 
            format:'DD/MM/YYYY HH:mm:ss',
            icons: { time: 'far fa-clock' } 
        });

    });
</script>
@endpush
@endsection