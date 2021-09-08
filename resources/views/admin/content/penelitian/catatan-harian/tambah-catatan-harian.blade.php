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
                            <form class="form-horizontal dropzone">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="judulPenelitian" class="col-sm-2 col-form-label">Judul
                                            Penelitian</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="judulPenelitian" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Pelaksanaan:</label>
                                        <div class="col-sm-10 input-group date" id="tanggalPelaksanaan" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                   data-target="#tanggalPelaksanaan"/>
                                            <div class="input-group-append" data-target="#tanggalPelaksanaan"
                                                 data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="isiCatatan" class="col-sm-2 col-form-label">Isi Catatan</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Isi Catatan" id="isiCatatan"
                                                      rows="2"> </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="uploadBerkas" class="col-sm-2 col-form-label">Upload Berkas</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="file" id="uploadBerkas"/>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-left">Simpan</button>
                                    <a href={{ route('penelitian.data-catatan-harian') }} type="submit"
                                       class="btn btn-danger float-right">Kembali</a>
                                </div>
                                <!-- /.card-footer -->
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
        <script>
            $(document).ready(function () {
                //Date picker
                $('#tanggalPelaksanaan').datetimepicker({
                    format: 'DD-MM-YYYY'
                });
                $(document).ready(function () {
                    const courseData = {
                        "draw": 0,
                        "recordsTotal": 1,
                        "recordsFiltered": 1,
                        "data": [
                            {
                                "id": 1,
                                "nama": "Prof. Jovan Ritchie",
                                "peran": "Ketua Peneliti",
                            }]
                    };
                    $('#anggota-penelitian').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: json_encode(courseData),
                        columns: [
                            {
                                data: 'nama',
                            },
                            {
                                data: 'peran',
                            },
                            // {
                            //     data: 'action',
                            //     name: 'action',
                            //     orderable: false
                            // }
                        ]
                    });
                });
            });
        </script>
    @endpush
@endsection
