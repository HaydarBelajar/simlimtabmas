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
                                                    ($detailPenelitian['tahun_id']==$tahun['tahun_id']) ? 'selected'
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
                                            <select class="form-control" id="fakultas-penelitian" name="fakultas_id"
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
                                        <label for="skema-penelitian" class="col-sm-2 col-form-label">Skema</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="skema-penelitian" name="skema_id" required>
                                                @foreach ($listSkema as $skema)
                                                <option {{ isset($detailPenelitian['skema_id']) &&
                                                    ($detailPenelitian['skema_id']==$skema['skema_id']) ? 'selected'
                                                    : '' }} value={{ $skema['skema_id'] }}>{{ $skema['skema_nama'] }}
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
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Alamat Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" placeholder="Email"
                                                name="email"
                                                value="{{ isset($detailPenelitian['email']) ? $detailPenelitian['email'] : '' }}"
                                                required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseTwo"
                                            aria-expanded="false">
                                            Atribut Usulan
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="rumpun-ilmu" class="col-sm-2 col-form-label">Rumpun Ilmu</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="rumpun-ilmu" name="rumpun_ilmu_id">
                                                @foreach ($listRumpunIlmu as $rumpunIlmu)
                                                <option {{ isset($detailPenelitian['rumpun_ilmu_id']) &&
                                                    ($detailPenelitian['rumpun_ilmu_id']==$rumpunIlmu['rumpun_ilmu_id']
                                                    ) ? 'selected' : '' }} value={{ $rumpunIlmu['rumpun_ilmu_id'] }}>{{
                                                    $rumpunIlmu['rumpun_ilmu_nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="bidang-fokus" class="col-sm-2 col-form-label">Bidang Fokus</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="bidang-fokus"
                                                name="bidang_fokus" placeholder="Bidang Fokus"
                                                value="{{ isset($detailPenelitian['bidang_fokus']) ? $detailPenelitian['bidang_fokus'] : '' }}">
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
                                        <label for="sumber-dana" class="col-sm-2 col-form-label">Sumber Dana</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="sumber-dana" name="sumber_dana_id"
                                                required>
                                                @foreach ($listSumberDana as $sumberDana)
                                                <option {{ isset($detailPenelitian['sumber_dana_id']) &&
                                                    ($detailPenelitian['sumber_dana_id']==$sumberDana['sumber_dana_id']
                                                    ) ? 'selected' : '' }} value={{ $sumberDana['sumber_dana_id'] }}>{{
                                                    $sumberDana['sumber_dana_nama'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jumlah-dana" class="col-sm-2 col-form-label">Jumlah Dana</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jumlah-sumber-dana"
                                                placeholder="Jumlah Dana" name="jumlah_sumber_dana" required
                                                value="{{ isset($detailPenelitian['jumlah_usulan_dana']) ? $detailPenelitian['jumlah_usulan_dana'] : '' }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="card card-primary">
                                <div class="card-header">
                                    <h4 class="card-title w-100">
                                        <a class="d-block w-100 collapsed" data-toggle="collapse" href="#collapseFour"
                                            aria-expanded="false">
                                            Isian Pengesahan
                                        </a>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="penandatanganan" class="col-sm-2 col-form-label">Mengetahui
                                            Penandatanganan</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="penandatanganan"
                                                name="mengetahui_penandatanganan_id" required>
                                                @foreach ($listUserPengusul as $userPengusul)
                                                <option {{ isset($detailPenelitian['user_mengetahui_id']) &&
                                                    ($detailPenelitian['user_mengetahui_id']==$userPengusul['id'] )
                                                    ? 'selected' : '' }} value={{ $userPengusul['id'] }}>{{
                                                    $userPengusul['name'] }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="jumlah-dana" class="col-sm-2 col-form-label">Jumlah Dana</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="jumlah-dana-penandatanganan"
                                                name="jumlah_dana_penandatanganan" placeholder="Jumlah Dana" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            --}}
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
                                    <div class="top-button-group" style="margin-bottom: 20px;">
                                        <button type="button" class="btn btn-primary" id="tambah-anggota">Tambah
                                            Anggota</button>
                                    </div>
                                    <table id="anggota-penelitian" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr>
                                                <th width="20%">Nama</th>
                                                <th width="20%">Peran</th>
                                                <th width="20%">Fakultas</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
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
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="jenis-luaran" class="col-sm-2 col-form-label">Jenis Luaran</label>
                                        <div class="col-sm-10 select2-purple">
                                            <select class="form-control select2" id="jenis-luaran" name="jenis_luaran[]"
                                                multiple="multiple" data-dropdown-css-class="select2-purple"
                                                style="width: 100%;">
                                                @foreach ($listCapaianLuaran as $capaianLuaran)
                                                <option {{ isset($detailPenelitian['jenis_luaran']) &&
                                                    (in_array($capaianLuaran['capaian_luaran_id'],
                                                    json_decode($detailPenelitian['jenis_luaran'], true))) ? 'selected'
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
                            <button type="submit" class="btn btn-success float-left">Simpan</button>
                            <a href={{ route('penelitian.data-penelitian') }} type="button"
                                class="btn btn-danger float-right">Kembali</a>
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
                                    <form method="post" id="tambah-anggota-form" class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <select class="form-control" id="nama-anggota" name="nama-anggota" required>
                                                @foreach ($listUserPengusul as $userPengusul)
                                                <option value={{ $userPengusul['id'] }} data-nama-pengusul={{
                                                    $userPengusul['name'] }}>{{ $userPengusul['name'] }}</option>
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
                                            <input type="hidden" name="action" id="action" value="Simpan" />
                                            <input type="submit" name="action_button" id="action_button"
                                                class="btn btn-primary" value="Add" />
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
                let anggotaPenelitian = $('#anggota-penelitian-list').val() ? JSON.parse($('#anggota-penelitian-list').val()) : [];
                let anggotaPenelitianIds = $('#list-anggota-penelitian').val() ? JSON.parse($('#list-anggota-penelitian').val()) : [];
                let lengthAnggotaPenelitian = anggotaPenelitian.length;

                $('#jenis-luaran').select2();

                let anggotaPenelitianDatatables = $('#anggota-penelitian').DataTable({
                    data: anggotaPenelitian,
                    deferRender: true,
                    // scrollY: 200,
                    scrollCollapse: true,
                    scroller: true
                });

                $(document).on('click', '#tambah-anggota', function() {
                    $('#notification').html('');
                    $('#formTambahAnggotaModal').modal('show');
                    $('#action_button').val('Simpan');
                    $('#action').val('Simpan');
                });

                $('#tambah-anggota-form').on('submit', function(event) {
                    event.preventDefault();
                    const namaAnggota =  $('#nama-anggota').find(":selected");
                    const namaPeranan =  $('#peranan-penelitian').find(":selected");
                    const namaFakultas =  $('#fakultas-penelitian-anggota').find(":selected");
                    console.log('namaFakultas', namaFakultas.val())
                    const namaAnggotaText = namaAnggota.text();
                    const namaPerananText = namaPeranan.text();
                    const namaFakultasText = namaFakultas.text();

                    const namaAnggotaId = namaAnggota.val();
                    const namaPerananId =  namaPeranan.val();
                    const namaFakultasId =  namaFakultas.val();

                    if ($('#action').val() == 'Simpan') {
                        anggotaPenelitian.push([namaAnggotaText, namaPerananText, namaFakultasText, `<a type="button" data-index=${lengthAnggotaPenelitian++} class="delete-anggota-penelitian btn btn-danger" style="color:white">Hapus</a>`, namaAnggotaId, namaPerananId, namaFakultasId]);
                        anggotaPenelitianIds.push({userId: namaAnggotaId, perananId: namaPerananId, fakultasId: namaFakultasId});
                    }

                    refreshDatatablesAnggotaPenelitian();

                });

                $('#anggota-penelitian tbody').on( 'click', '.delete-anggota-penelitian', function () {
                    anggotaPenelitianDatatables
                        .row( $(this).parents('tr') )
                        .remove()
                        .draw();
                    
                    const dataDatatables = anggotaPenelitianDatatables.data();
                    const dataDatatablesMap = dataDatatables.map( data =>  ({
                        userId: data[4],
                        perananId: data[5],
                        fakultasId: data[6],
                    }))

                    anggotaPenelitian = dataDatatables;
                    anggotaPenelitianIds = dataDatatablesMap;

                    refreshDatatablesAnggotaPenelitian();
                } );
                // $(document).on('click', '.delete-anggota-penelitian', function() {
                //     const indexData =  $(this).data('index');
                //     anggotaPenelitian.splice(indexData, 1);
                //     anggotaPenelitianIds.splice(indexData, 1);

                //     refreshDatatablesAnggotaPenelitian();
                // });

                function refreshDatatablesAnggotaPenelitian () {
                    console.log('hello',anggotaPenelitian);
                    $('#list-anggota-penelitian').val(JSON.stringify(anggotaPenelitianIds));
                    /**
                    * Reset Datatables
                    * $('#anggota-penelitian').DataTable().ajax.reload(); tidak bisa, ini dilakukan hanya jika pakai ajax call
                    *
                    **/
                    $('#anggota-penelitian').DataTable().clear().draw();
                    $('#anggota-penelitian').DataTable().rows.add(anggotaPenelitian); // Add new data
                    $('#anggota-penelitian').DataTable().columns.adjust().draw(); // Redraw the DataTable
                }

            });
</script>
@endpush
@endsection