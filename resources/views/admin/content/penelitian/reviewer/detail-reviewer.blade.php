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
            <div class="row">
                <div class="col-12">
                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fa fa-bookmark"></i> {{ $reviewerData['name'] ?? '' }}
                                    <input type="hidden" id="reviewer-id" data-id="{{ $reviewerData['id'] ?? '' }}">
                                    <div class="float-right">
                                        <small></small>
                                    </div>
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card card-default color-palette-box">
                        <div class="card-header">
                            <h3 class="card-title">
                                Daftar Reviewer
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="top-button-group" style="margin-bottom: 20px;">
                                <a type="button" target="_blank"
                                    href="{{ route('penelitian.penugasan-reviewer', $reviewerData['id'] ?? '') }}"
                                    class="btn btn-primary tambah-catatan-harian"
                                    style="text-decoration: none; color: #FFFFFF;">Tambah
                                    Penelitian</a>
                            </div>
                            <span id="notification"></span>
                            <table id="tabel-detail-reviewer" class="table table-striped table-bordered"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="5%">Tahun Usulan</th>
                                        <th width="5%">Tahun Pelaksanaan</th>
                                        <th width="10%">Judul Penelitian</th>
                                        <th width="10%">Ketua Peneliti</th>
                                        <th width="10%">Fakultas</th>
                                        <th width="10%">Aksi</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="card-body">
                            <a href={{ route('penelitian.reviewer') }} type="button"
                                class="btn btn-danger float-right">Kembali</a>
                        </div>
                    </div>
                </div>
            </div> <!-- /.row2 -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <!-- Modal -->
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 style="margin:0; text-align: center;">Apakah anda ingin menghapus data ini ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_delete_button" id="ok-delete-button"
                        class="btn btn-danger">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->
@push('scripts')
<script>
    $(document).ready(function () {
        let catatanPenelitianID;
        let kucingkuId = $('#kucingku-id').val();
        let reviewerId = $('#reviewer-id').attr('data-id');

        @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.error("{{ session('error') }}");
        @endif
        console.log(`/penelitian/get-penelitian-by-reviwer-datatables/${reviewerId}`)
        /**
         * Data Table
         *
         */
        $('#tabel-detail-reviewer').DataTable({
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "/penelitian/get-penelitian-by-reviwer-datatables/" + reviewerId,
            },
            columns: [
                {
                    data: 'usulan_penelitian_id',
                    name: 'No',
                    render: function ( data, type, row, meta ) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'tahun',
                    name: 'Tahun Usulan',
                    render: function ( data, type, row ) {
                        if (data) {
                            return data.tahun;
                        } else {
                            return '-';
                        }

                    }
                },
                {
                    data: 'tahun_pelaksanaan',
                    name: 'Tahun Pelaksanaan',
                    render: function ( data, type, row ) {
                        if (data) {
                            return data.tahun;
                        } else {
                            return '-';
                        }

                    }
                },
                {
                    data: 'judul',
                    name: 'Judul'
                },
                {
                    data: 'peneliti_utama',
                    name: 'Ketua Peneliti',
                    render: function ( data, type, row ) {
                        if (data) {
                            return data.name;
                        } else {
                            return '-';
                        }

                    }
                },
                {
                    data: 'fakultas_penelitian',
                    name: 'Fakultas',
                    render: function ( data, type, row ) {
                        if (data) {
                            return data.namafakultas;
                        } else {
                            return '-';
                        }

                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                }
            ]
        });

        /**
         * Delete Function
         *
         */
      $(document).on('click', '.delete', function() {
          catatanPenelitianID = $(this).attr('id');
          $('#confirmModal').modal('show');
      });

      $('#ok-delete-button').click(function() {
          $.ajax({
              url: "/penelitian/hapus-catatan-harian/" + catatanPenelitianID,
              method: "GET",
              data: {
                  "_token": "{{ csrf_token() }}",
              },
              beforeSend: function() {
                  $('#ok-delete-button').text('Proses Menghapus...');
              },
              success: function(data) {
                  var html = '';
                  if (data.errors) {
                    alert("Data gagal dihapus !");
                    html = `<div class="alert alert-danger"> ${data.errors} ! </div>`;
                  }
                  if (data.success) {
                    alert("Data successfully added or edited !");
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#tabel-catatan-harian').DataTable().ajax.reload();
                    $('#confirmModal').modal('hide');
                  }
                  $('#form-result').html(html);
              }
          })
      });
        /**
         * End Delete Function
         *
         */
    });
</script>
@endpush
@endsection