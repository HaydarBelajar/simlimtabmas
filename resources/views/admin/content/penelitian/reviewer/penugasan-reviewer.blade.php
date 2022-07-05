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
                        <form action="{{ $page == " edit" ? route('penelitian.update-penugasan-reviewer',
                            $reviewerDetail['id']) : route('penelitian.create-penugasan-reviewer',
                            $reviewerDetail['id']) }}" method="POST">
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
                                            <select class="form-control" id="tahun-usulan" name="tahun_usulan_id"
                                                required>
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
                                                <option selected disabled>Pilih Fakultas</option>
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
                                        <label for="daftar-penelitian" class="col-sm-2 col-form-label">Daftar
                                            Penelitian</label>
                                        <div class="col-sm-10 select2-purple">
                                            <select class="form-control select2" id="daftar-penelitian"
                                                name="daftar_penelitian[]" multiple="multiple"
                                                data-dropdown-css-class="select2-purple" style="width: 100%;" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="reviewer_id" id="reviewer-id"
                                value="{{ isset($reviewerDetail['id']) ? $reviewerDetail['id'] : '' }}" />
                            <button type="submit" class="btn btn-success float-left">Simpan</button>
                            <a href={{ route('penelitian.reviewer-detail', isset($reviewerDetail['id']) ?
                                $reviewerDetail['id'] : '' ) }} type="button"
                                class="btn btn-danger float-right">Kembali</a>
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

                $('#daftar-penelitian').select2();

                $('#fakultas-penelitian').change(function () {

                    const tahunUsulan =  $('#tahun-usulan').find(":selected");
                    const tahunPelaksanaan =  $('#tahun-pelaksanaan').find(":selected");
                    const fakultas =  $('#fakultas-penelitian').find(":selected");

                    const tahunUsulanId = tahunUsulan.val();
                    const tahunPelaksanaanId =  tahunPelaksanaan.val();
                    const fakultasId =  fakultas.val();
                    
                    let getPenelitianCascader = `/penelitian/get-penelitian-cascader/${tahunUsulanId}/${tahunPelaksanaanId}/${fakultasId}`;

                    $.ajax({
                      url: getPenelitianCascader,
                      method: "GET",
                      success: function(data) {
                          if (data.errors) {
                            alert("Terjadi error sistem, usulan gagal diloloskan !");
                          }
                          if (data.success) {
                            let optionData = data.data.map( a => {
                                let id = a.usulan_id;
                                let text = `${a.bidang_fokus} | ${a.judul}`;

                                var newOption = $('<option></option>').attr("value", id).text(text);
                                return newOption;
                            })
                            $('#daftar-penelitian').empty().append(optionData).trigger('change');
                          }
                      }
                  })

                });
            });
</script>
@endpush
@endsection