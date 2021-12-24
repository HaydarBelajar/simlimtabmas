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
                            <form action="{{ $page == "edit" ? route('penelitian.update-penugasan-reviewer', $reviewerDetail['id']) : route('penelitian.penugasan-reviewer', $reviewerDetail['id']) }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ (isset($page) && $page == 'edit') ? 'edit' : 'tambah' }}">
                                    <div class="card card-primary">
                                        <div class="card-header">
                                            <h4 class="card-title w-100">
                                                <a class="d-block w-100 collapsed" data-toggle="collapse"
                                                   href="#collapseOne" aria-expanded="false">
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
                                                            <option {{ isset($detailPenelitian['tahun_id']) && ($detailPenelitian['tahun_id'] == $tahun['tahun_id']) ? 'selected' : '' }} 
                                                                value={{ $tahun['tahun_id'] }}>{{ $tahun['tahun_usulan'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tahun-pelaksanaan" class="col-sm-2 col-form-label">Tahun Pelaksanaan</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="tahun-pelaksanaan"  name="tahun_pelaksanaan_id" required>
                                                        @foreach ($listTahun as $tahun)
                                                            <option {{ isset($detailPenelitian['tahun_pelaksanaan_id']) && ($detailPenelitian['tahun_pelaksanaan_id'] == $tahun['tahun_id']) ? 'selected' : '' }}
                                                                value={{ $tahun['tahun_id'] }}>{{ $tahun['tahun_usulan'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="fakultas-penelitian"
                                                        class="col-sm-2 col-form-label">Fakultas</label>
                                                <div class="col-sm-10">
                                                    <select class="form-control" id="fakultas-penelitian" name="fakultas_id" required>
                                                        @foreach ($listFakultas as $fakultas)
                                                            <option {{ isset($detailPenelitian['fakultas_id']) && ($detailPenelitian['fakultas_id'] == $fakultas['kdfakultas']) ? 'selected' : '' }}
                                                                value={{ $fakultas['kdfakultas'] }}>{{ $fakultas['namafakultas'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="daftar-penelitian"
                                                        class="col-sm-2 col-form-label">Daftar Penelitian</label>
                                                <div class="col-sm-10 select2-purple">
                                                    <select class="form-control select2" id="daftar-penelitian" name="daftar_penelitian[]" multiple="multiple" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                                        {{-- @foreach ($listCapaianLuaran as $capaianLuaran)
                                                            <option {{ isset($detailPenelitian['jenis_luaran']) && (in_array($capaianLuaran['capaian_luaran_id'], json_decode($detailPenelitian['jenis_luaran'], true))) ? 'selected' : '' }}
                                                                value={{ $capaianLuaran['capaian_luaran_id'] }}>{{ $capaianLuaran['capaian_luaran_nama'] }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <input type="hidden" name="list_anggota_penelitian" id="list-anggota-penelitian" value="{{ isset($anggotaPenelitianIds) ? json_encode($anggotaPenelitianIds) : '[]' }}"/>
                                <input type="hidden" name="anggotaPenelitian" id="anggota-penelitian-list" value="{{ isset($anggotaPenelitian) ? json_encode($anggotaPenelitian) : '[]' }}"/>
                                <input type="hidden" name="usulan_penelitian_id" id="usulan-penelitian-id" value="{{ isset($detailPenelitian['usulan_penelitian_id']) ? $detailPenelitian['usulan_penelitian_id'] : '' }}"/>
                                <button type="submit" class="btn btn-success float-left">Simpan</button>
                                <a href={{ route('penelitian.data-penelitian') }} type="button" class="btn btn-danger float-right">Kembali</a>
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
