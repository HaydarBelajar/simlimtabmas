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
                                                        <select class="form-control" id="skema-penelitian" name="skema" required>
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
                                                        <select class="form-control" id="durasi-kegiatan" name="dutasi_kegiatan" required>
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
                                                    <label for="usulan-tahun-ke"
                                                           class="col-sm-2 col-form-label">Usulan Tahun ke</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="usulan-tahun-ke" name="usulan_tahun_ke" required>
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
                                                        <textarea class="form-control" placeholder="Judul" id="judul" rows="2" name="judul" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="abstrak" class="col-sm-2 col-form-label">Abstrak</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" placeholder="abstrak" id="abstrak" rows="2" name="abstrak" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="keywords" class="col-sm-2 col-form-label">Keywords</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control" placeholder="keywords" id="keywords" rows="2" name="keywords" required> </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                                                    <div class="col-sm-10">
                                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
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
                                                        <select class="form-control" id="rumpun-ilmu" name="rumpun_ilmu">
                                                            @foreach ($listRumpunIlmu as $rumpunIlmu)
                                                                <option value={{ $rumpunIlmu['rumpun_ilmu_id'] }}>{{ $rumpunIlmu['rumpun_ilmu_nama'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="bidang-fokus" class="col-sm-2 col-form-label">Bidang Fokus</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="bidang-fokus" name="bidang_fokus" placeholder="Bidang Fokus">
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
                                                        <select class="form-control" id="sumber-dana" name="sumber_dana" required>
                                                            @foreach ($listSumberDana as $sumberDana)
                                                                <option value={{ $sumberDana['sumber_dana_id'] }}>{{ $sumberDana['sumber_dana_nama'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="jumlah-dana"
                                                           class="col-sm-2 col-form-label">Jumlah Dana</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jumlah-dana" placeholder="Jumlah Dana" name="jumlah_dana" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFour" aria-expanded="false">
                                                    Biaya Usulan
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseFour" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="penandatanganan" class="col-sm-2 col-form-label">Mengetahui Penandatanganan</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" id="penandatanganan" name="mengetahui_penandatanganan" required>
                                                            @foreach ($listUserPengusul as $userPengusul)
                                                                <option value={{ $userPengusul['id'] }}>{{ $userPengusul['name'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="jumlah-dana"
                                                           class="col-sm-2 col-form-label">Jumlah Dana</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="jumlah-dana" placeholder="Jumlah Dana" required>
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
                                                    <button type="button" class="btn btn-primary" id="tambah-anggota">Tambah Anggota</button>
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
                                                   href="#collapseSix" aria-expanded="false">
                                                    Jenis Luaran
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseSix" class="collapse" data-parent="#accordion" style="">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label for="jenis-luaran"
                                                           class="col-sm-2 col-form-label">Jenis Luaran</label>
                                                    <div class="col-sm-10 select2-purple">
                                                        <select class="form-control select2" id="jenis-luaran" name="jenis_luaran[]" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                            @foreach ($listCapaianLuaran as $capaianLuaran)
                                                                <option value={{ $capaianLuaran['capaian_luaran_id'] }}>{{ $capaianLuaran['capaian_luaran_nama'] }}</option>
                                                            @endforeach
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
                        <!-- modal tambah anggota penelitian -->
                        <div id="formTambahAnggotaModal" class="modal fade" role="dialog">
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
                                        <form method="post" id="edit-form" class="form-horizontal">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Anggota</label>
                                                <select class="form-control" id="nama-anggota" name="nama-anggota" required>
                                                    @foreach ($listUserPengusul as $userPengusul)
                                                        <option value={{ $userPengusul['id'] }}>{{ $userPengusul['name'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Peranan Penelitian</label>
                                                <select class="custom-select" name="peranan-penelitian" id="peranan-penelitian">
                                                    @foreach ($listPeranan as $peranan)
                                                        <option value="{{ $peranan['peranan_id'] }}">{{ $peranan['peranan_nama'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br/>
                                            <div class="modal-footer">
                                                <input type="hidden" name="action" id="action" value="Simpan"/>
                                                <input type="hidden" name="usulan_penelitian_id" id="usulan-penelitian-id"/>
                                                <input type="submit" name="action_button" id="action_button" class="btn btn-primary" value="Add"/>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#jenis-luaran').select2();

                $(document).on('click', '#tambah-anggota', function() {
                    console.log('asdasd')
                    $('#notification').html('');
                    $('#formTambahAnggotaModal').modal('show');
                    $('#action_button').val('Simpan');
                    $('#action').val('Simpan');
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
