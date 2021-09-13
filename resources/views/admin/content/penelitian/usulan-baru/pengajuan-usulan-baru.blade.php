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
                            <form action="{{route('penelitian.simpan-penelitian')}}" method="POST">
                                @csrf
                                <div id="accordion">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseOne" aria-expanded="false">
                                                    Identitas Usulan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="tahun-usulan" class="col-sm-2 col-form-label">Tahun
                                                        Usulan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="tahun-usulan" name="tahun_usulan" required>
                                                            @foreach ($listTahun as $tahun)
                                                                <option value={{ $tahun['tahun_id'] }}>{{ $tahun['tahun_usulan'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="tahun-pelaksanaan" class="col-sm-2 col-form-label">Tahun
                                                        Pelaksanaan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="tahun-pelaksanaan"  name="tahun_pelaksanaan" required>
                                                            @foreach ($listTahun as $tahun)
                                                                <option value={{ $tahun['tahun_id'] }}>{{ $tahun['tahun_usulan'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="skema-penelitian"
                                                           class="col-sm-2 col-form-label">Skema</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="skema-penelitian" required>
                                                            @foreach ($listSkema as $skema)
                                                                <option value={{ $skema['skema_id'] }}>{{ $skema['skema_nama'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="durasi-kegiatan"
                                                           class="col-sm-2 col-form-label">Durasi Kegiatan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="durasi-kegiatan" required>
                                                            <option>1 Bulan</option>
                                                            <option>2 Bulan</option>
                                                            <option>3 Bulan</option>
                                                            <option>4 Bulan</option>
                                                            <option>5 Bulan</option>
                                                            <option>6 Bulan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="durasi-kegiatan"
                                                           class="col-sm-2 col-form-label">Usulan Tahun ke</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="durasi-kegiatan" required>
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" placeholder="Judul" id="judul" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" placeholder="abstrak" id="abstrak" rows="2" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" placeholder="keywords" id="keywords" rows="2" required> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseTwo" aria-expanded="false">
                                                    Atribut Usulan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="rumpun-ilmu"
                                                           class="col-sm-2 col-form-label">Rumpun Ilmu</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="rumpun-ilmu">
                                                            <option>Penelitian Grant</option>
                                                            <option>Penelitian Payung</option>
                                                            <option>Penelitian Institusi</option>
                                                            <option>Penelitian Desertasi Doktor</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="bidang-fokus" class="col-sm-2 col-form-label">Bidang
                                                        Fokus</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="bidang-fokus"
                                                               placeholder="Bidang Fokus">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseThree" aria-expanded="false">
                                                    Isian Pengesahan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="sumber-dana"
                                                           class="col-sm-2 col-form-label">Sumber Dana</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="sumber-dana">
                                                            <option>Biaya Sendiri</option>
                                                            <option>Biaya Instansi Sendiri</option>
                                                            <option>Lembaga Swasta Kerjasama</option>
                                                            <option>Lembaga Swasta Kompetisi</option>
                                                            <option>Lembaga Pemerintah Kerjasama</option>
                                                            <option>Lembaga Pemerintah Kompetisi</option>
                                                            <option>Lembaga Internasional</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="jumlah-dana"
                                                           class="col-sm-2 col-form-label">Jumlah Dana</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jumlah-dana"
                                                               placeholder="Jumlah Dana">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseFour" aria-expanded="false">
                                                    Biaya Usulan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="penandatanganan"
                                                           class="col-sm-2 col-form-label">Mengetahui
                                                        Penandatanganan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="penandatanganan">
                                                            <option>Danur</option>
                                                            <option>Wijayanto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="jumlah-dana"
                                                           class="col-sm-2 col-form-label">Jumlah Dana</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jumlah-dana"
                                                               placeholder="Jumlah Dana">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseFive" aria-expanded="false">
                                                    Anggota Penelitian
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="top-button-group" style="margin-bottom: 20px;">
                                                    <button type="submit" class="btn btn-primary">Tambah Anggota</button>
                                                </div>
                                                <table id="anggota-penelitian" class="table table-striped table-bordered"
                                                       style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th width="20%">Nama</th>
                                                        <th width="20%">Peran</th>
                                                        <th width="20%">Aksi</th>
                                                    </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseFive" aria-expanded="false">
                                                    Jenis Luaran
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFive" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="jenis-luaran"
                                                           class="col-sm-2 col-form-label">Jenis Luaran</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="jenis-luaran" name="jenis_luaran[]" multiple="multiple">
                                                            <option>Publikasi Ilmiah</option>
                                                            <option>Buku Ajar</option>
                                                            <option>Pembicara pada Pertemuan Ilmiah</option>
                                                            <option>Sebagai Pembicara Kunci</option>
                                                            <option>Undangan Sebagai Visiting Scientist Pada Perguruan Tinggi Lain</option>
                                                            <option>Luaran Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success float-left">Simpan</button>
                                <a href={{ route('penelitian.data-penelitian') }} type="submit" class="btn btn-danger float-right">Kembali</a>
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
            $(document).ready(function() {
                $('#jenis-luaran').select2();
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
