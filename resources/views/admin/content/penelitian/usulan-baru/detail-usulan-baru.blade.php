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
                          <i class="fa fa-bookmark"></i> {{ $detailPenelitian['judul'] ?? '' }}
                          @if($detailPenelitian['status'] == 1) 
                            <span class="badge badge-success">Usulan Lolos</span>
                          @else
                            <button type="button" id='button-loloskan-usulan' data-id='{{ $detailPenelitian["usulan_penelitian_id"] ?? '' }}' class="btn btn-danger btn-sm"><i class="fa fa-bell"></i> Loloskan Usulan</button>
                          @endif
                          <div class="float-right">
                            <small>Tanggal Upload: 2/10/2014</small>
                          </div>
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        <strong>Abstrak</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                         {{ $detailPenelitian['abstrak'] ?? '' }}
                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <strong>Tahun Pelaksanaan</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                          {{ $detailPenelitian['tahun_pelaksanaan'] ? $detailPenelitian['tahun_pelaksanaan']['tahun_usulan'] : '' }}
                         </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <strong>Jumlah Usulan Dana</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                        <?php 
                          $amount = $detailPenelitian['jumlah_usulan_dana'] ?? '0' ;
                          $formatter = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                          echo($formatter->formatCurrency($amount, 'IDR'));
                        ?>
                        </p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                        <strong>Bidang Fokus</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                         {{ $detailPenelitian['bidang_fokus'] ?? '' }}
                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <strong>Sumber Dana</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                          {{ $detailPenelitian['sumber_dana'] ? $detailPenelitian['sumber_dana']['sumber_dana_nama'] : '' }}
                         </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <strong>Durasi Kegiatan</strong>
                        <p class="well well-sm shadow-none" style="margin-top: 10px;">
                          {{ $detailPenelitian['durasi_kegiatan'] ? $detailPenelitian['durasi_kegiatan'] : '' }}
                        </p>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- Table row -->
                    {{-- <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Serial #</th>
                            <th>Description</th>
                            <th>Subtotal</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td>1</td>
                            <td>Call of Duty</td>
                            <td>455-981-221</td>
                            <td>El snort testosterone trophy driving gloves handsome</td>
                            <td>$64.50</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Need for Speed IV</td>
                            <td>247-925-726</td>
                            <td>Wes Anderson umami biodiesel</td>
                            <td>$50.00</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Monsters DVD</td>
                            <td>735-845-642</td>
                            <td>Terry Richardson helvetica tousled street art master</td>
                            <td>$10.70</td>
                          </tr>
                          <tr>
                            <td>1</td>
                            <td>Grown Ups Blue Ray</td>
                            <td>422-568-642</td>
                            <td>Tousled lomo letterpress</td>
                            <td>$25.99</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div> --}}
                    <!-- /.row -->
      
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-sm-4">
                        <strong>Anggota Penelitian</strong>      
                        <div class="table-responsive card" style="margin-top: 10px;">
                          <table class="table">
                            <tbody>
                            <tr>
                              <th>Peneliti Utama</th>
                              <td>{{ $detailPenelitian['peneliti_utama']['name'] ?? ' - ' }}</td>
                            </tr>
                            <tr>
                              <th>Anggota 1</th>
                              <td>{{ $detailPenelitian['anggota1']['name'] ?? ' - ' }}</td>
                            </tr>
                            <tr>
                              <th>Anggota 2</th>
                              <td>{{ $detailPenelitian['anggota2']['name'] ?? ' - ' }}</td>
                            </tr>
                            <tr>
                              <th>Anggota 3</th>
                              <td>{{ $detailPenelitian['anggota3']['name'] ?? ' - ' }}</td>
                            </tr>
                          </tbody></table>
                        </div>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4">
                        <strong>Luaran Penelitian</strong>
                          <ul>
                            @foreach ($detailPenelitian['capaian_luaran'] as $capaianLuaran)
                              <li>{{ $capaianLuaran['capaian_luaran_nama'] }}</li>
                            @endforeach
                          </ul>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- this row will not appear when printing -->
                    {{-- <div class="row no-print">
                      <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                          Payment
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button>
                      </div>
                    </div> --}}
                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
              <div class="row">
                <div class="col-12">
                  <div class="card card-default color-palette-box">
                    <div class="card-header">
                      <h3 class="card-title">
                        Catatan Harian Penelitian
                      </h3>
                    </div>
                    <div class="card-body">
                        <div class="top-button-group" style="margin-bottom: 20px;">
                            <button type="button" class="btn btn-primary tambah-catatan-harian">Tambah Catatan Harian</button>
                        </div>
                        <span id="notification"></span>
                        <table id="tabel-catatan-harian" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Tanggal Pelaksanaan</th>
                                <th width="50%">Catatan</th>
                                <th width="10%">Dokumen</th>
                                <th width="10%">Aksi</th>
                            </tr>
                            </thead>
                        </table>
                      </div>
                      <div class="card-body">
                        <a href={{ route('penelitian.data-penelitian') }} type="button" class="btn btn-danger float-right">Kembali</a>
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
                    <button type="button" name="ok_delete_button" id="ok-delete-button" class="btn btn-danger">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
          </div>
        </div>

        <div id="confirmLolosUsulanModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 style="margin:0; text-align: center;">Apakah anda ingin melolokskan usulan ini ?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" name="ok_loloskan_usulan" id="lolos-usulan-button" class="btn btn-danger">Ok</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
            </div>
          </div>
        </div>

        <div id="form-catatan-harian-modal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Catatan Harian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <span id="form-result"></span>
                <!-- <div class="alert alert-danger" role="alert">
                  This is a danger alert—check it out!
                </div> -->
                <form method="post" id="form-catatan-harian" class="form-horizontal" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label class="col-form-label">Tanggal Pelaksanaan : </label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                      <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name='tanggal_pelaksanaan' required/>
                      <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Catatan : </label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="2" required></textarea>
                  </div>
                  <div class="form-group">
                    <label class="col-form-label">Upload Berkas : </label>
                    <input type="file" name="fileToUpload" id="fileToUpload" required>
                  </div>
                  <br />
                  <div class="modal-footer">
                    <input type="hidden" id="id-penelitian" name="id_penelitian">
                    <input type="hidden" id="id-catatan-penelitian" name="id_catatan_penelitian">
                    <input type="hidden" name="action" id="action" value="Simpan" />
                    <input type="submit" name="action_button" id="action-button" class="btn btn-primary" value="Simpan" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /.Modal -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
        <script>
            $(document).ready(function () {
              let catatanPenelitianID;
              /**
              * Loloskan Usulan Function
              *
              */
              $(document).on('click', '#button-loloskan-usulan', function() {
                catatanPenelitianID = $(this).attr('data-id');
                $('#confirmLolosUsulanModal').modal('show');
              });
              
              $('#lolos-usulan-button').click(function() {
                  $.ajax({
                      url: "/penelitian/update-status-penelitian/" + catatanPenelitianID,
                      method: "GET",
                      data: {
                          "_token": "{{ csrf_token() }}",
                          "status": "1",
                      },
                      beforeSend: function() {
                          $('#lolos-usulan-button').text('Proses Menghapus...');
                      },
                      success: function(data) {
                          if (data.errors) {
                            alert("Terjadi error sistem, usulan gagal diloloskan !");
                          }
                          if (data.success) {
                            alert("Status usulan berhasil dirubah !");
                            $('#confirmLolosUsulanModal').modal('hide');
                            location.reload();
                          }
                      }
                  })
              });

              /**
              * End Loloskan Usulan Function
              *
              */

              $(document).on('click', '.tambah-catatan-harian', function() {
                $('#form-result').html('');
                $('#form-catatan-harian-modal').modal('show');
                $('#action-button').val('Simpan');
                $('#action').val('Simpan');
                $('#id-penelitian').val("{{ $detailPenelitian['usulan_penelitian_id'] ?? '' }}");
              });

              $('#reservationdate').datetimepicker({
                format: 'L'
              });

              /**
              * Add Function
              *
              */
              $('#form-catatan-harian').on('submit', function(event) {
                event.preventDefault();
                var action_url = '';

                if ($('#action').val() == 'Simpan') {
                  action_url = "{{ route('penelitian.tambah-catatan-harian') }}";
                }

                if ($('#action').val() == 'Edit') {
                  action_url = "{{ route('penelitian.edit-catatan-harian') }}";
                }

                $.ajax({
                  url: action_url,
                  method: "POST",
                  data: new FormData(this),
                  processData: false,
                  contentType: false,
                  dataType: "json",
                  success: function(data) {
                    var html = '';
                    if (data.errors) {
                      alert("Data gagal ditambahkan atau dirubah !");
                      html = `<div class="alert alert-danger"> ${data.errors} </div>`;
                    }
                    if (data.success) {
                      alert("Data successfully added or edited !");
                      html = '<div class="alert alert-success">' + data.success + '</div>';
                      $('#form-catatan-harian')[0].reset();
                      $('#tabel-catatan-harian').DataTable().ajax.reload();
                      $('#form-catatan-harian-modal').modal('hide');
                    }
                    $('#form-result').html(html);
                  }
                });
              });
              /**
              * End Add Function
              *
              */

              // Ketika Tombol Edit Diklick
              $(document).on('click', '.edit', function() {
                var id = $(this).attr('id');

                $('#form-result').html('');
                $('#form-catatan-harian-modal').modal('show');
                $("#edit-form :input").attr("disabled", false);
                $('.edit-content').hide();
                $(".edit-content :input").prop('required', false);
              });


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

              $('#tabel-catatan-harian').DataTable({
                  "scrollX": true,
                  processing: true,
                  serverSide: true,
                  ajax: {
                      url: "{{ route('penelitian.get-catatan-harian', $detailPenelitian['usulan_penelitian_id']) }}",
                  },
                  columns: [
                      {
                          data: 'catatan_penelitian_id',
                          name: 'No',
                          render: function ( data, type, row, meta ) {
                              return meta.row + meta.settings._iDisplayStart + 1;
                          }
                      },
                      {
                          data: 'tanggal_pelaksanaan',
                          name: 'Tanggal Pelaksanaan',
                          render: function ( data, type, row ) {
                              return moment(data).tz('Asia/Jakarta').format('DD-MM-YYYY');
                          }
                      },
                      {
                          data: 'deskripsi',
                          name: 'Catatan'
                      },
                      {
                          name: 'Dokumen',
                          data: 'berkas',
                          className: 'text-right py-0 align-middle',
                          render: function ( data, type, row ) {
                              return `<div class="btn-group btn-group-sm">
                                  <a target="_blank" href="{{ asset('media/catatanHarian') }}/${row.berkas}" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
                              </div>`;
                              // return 'asdasd';
                          }
                      },
                      {
                          data: 'action',
                          name: 'action',
                          orderable: false
                      }
                  ]
              });
            });
        </script>
    @endpush
@endsection
