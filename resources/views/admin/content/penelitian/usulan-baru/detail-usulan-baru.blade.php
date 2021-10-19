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
                          <small class="float-right">Tanggal Upload: 2/10/2014</small>
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
                      <div class="col-6">
                        <p class="lead">Jenis Luaran</p>
      
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                          plugg
                          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                      </div>
                      <!-- /.col -->
                      <div class="col-6">
                        <p class="lead">Amount Due 2/22/2014</p>
      
                        <div class="table-responsive">
                          <table class="table">
                            <tbody><tr>
                              <th style="width:50%">Subtotal:</th>
                              <td>$250.30</td>
                            </tr>
                            <tr>
                              <th>Tax (9.3%)</th>
                              <td>$10.34</td>
                            </tr>
                            <tr>
                              <th>Shipping:</th>
                              <td>$5.80</td>
                            </tr>
                            <tr>
                              <th>Total:</th>
                              <td>$265.24</td>
                            </tr>
                          </tbody></table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                          Payment
                        </button>
                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button>
                      </div>
                    </div>
                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    {{-- @push('scripts')
        <script>
            $(document).ready(function () {

                @if(Session::has('message'))
                console.log('asdasd', "{{ session('message') }}")
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


                $(document).on('click', '.delete', function() {
                    user_id = $(this).attr('id');
                    $('#confirmModal').modal('show');
                });

                $('#ok-delete-button').click(function() {
                    $.ajax({
                        url: "/manage-user/delete/" + user_id,
                        method: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}",
                        },
                        beforeSend: function() {
                            $('#ok-delete-button').text('Proses Menghapus...');
                        },
                        success: function(data) {
                            setTimeout(function() {
                                if (data.errors) {
                                    $('#confirmModal').modal('hide');
                                    $('#user-table').DataTable().ajax.reload();
                                    alert(data.errors);
                                } else {
                                    $('#confirmModal').modal('hide');
                                    $('#user-table').DataTable().ajax.reload();
                                    alert('Data Sukses Terhapus');
                                }
                            }, 2000);
                        }
                    })
                });

                $('#penelitian-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('penelitian.get-all') }}",
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
                            data: 'judul',
                            name: 'Judul Penelitian'
                        },
                        {
                            data: 'file_upload_pengesahan',
                            render: function ( data, type, row ) {
                                if (data) {
                                    return 'Sudah Terupload';
                                }else {
                                    return 'Belum Terupload';
                                }
                            }
                        },
                        {
                            name: 'Pengesahan',
                            data: 'usulan_penelitian_id',
                            className: 'text-right py-0 align-middle',
                            render: function ( data, type, row ) {
                                return `<div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info upload-pengesahan" data-id="${data}"><i class="fas fa-file-upload"></i></a>
                                    <a target="_blank" href="{{ asset('media/pengesahan') }}/${row.file_upload_pengesahan}" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
                                </div>`;
                            }
                        },
                        {
                            data: 'file_upload_proposal',
                            render: function ( data, type, row ) {
                                if (data) {
                                    return 'Sudah Terupload';
                                }else {
                                    return 'Belum Terupload';
                                }
                            }
                        },
                        {
                            name: 'Proposal',
                            data: 'usulan_penelitian_id',
                            className: 'text-right py-0 align-middle',
                            render: function ( data, type, row ) {
                                return `<div class="btn-group btn-group-sm">
                                    <a href="#" class="btn btn-info upload-proposal" data-id="${data}"><i class="fas fa-file-upload"></i></a>
                                    <a target="_blank" href="{{ asset('media/proposal') }}/${row.file_upload_proposal}" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
                                </div>`;
                            }
                        },
                        {
                            data: 'status',
                            name: 'Status Seleksi',
                        },
                        {
                            data: 'created_at',
                            name: 'Tanggal Upload',
                            render: function ( data, type, row ) {
                                return moment(data).tz('Asia/Jakarta').format('DD-MM-YYYY HH:MM');
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        }
                    ]
                });

                $(document).on('click', '.upload-proposal, .upload-pengesahan', function() {
                    $('#modalUpload').modal('show');
                    let isUploadProposal = false;
                    let isUploadPengesahan = false;
                    let url = '';
                    const id = $(this).data("id")

                    var classList = this.classList.toString();
                    $('#id-penelitian').val(id);
                    if (classList.includes('upload-proposal')){
                        isUploadProposal = true;
                        isUploadPengesahan = false;
                        url = "/penelitian/upload-proposal";
                        $('#upload-file').attr('action', url);
                    }
                    if (classList.includes('upload-pengesahan')){
                        isUploadProposal = false;
                        isUploadPengesahan = true;
                        url = "/penelitian/upload-pengesahan";
                        $('#upload-file').attr('action', url);
                    }
                    // DropZone

                    // Dropzone.options.uploadFile = { // camelized version of the `id`
                    //     paramName: "file", // The name that will be used to transfer the file
                    //     maxFilesize: 2, // MB
                    //     maxFile: 1,
                    //     url,
                    //     init: function() {
                    //         this.on("addedfile", file => {
                    //         console.log("A file has been added");
                    //         });
                    //     },
                    //     accept: function(file, done) {
                    //     if (file.name == "justinbieber.jpg") {
                    //         done("Naha, you don't.");
                    //     }
                    //     else { done(); }
                    //     }
                    // };

                    // $('#action_button').val('Simpan');
                    // $('#action').val('Simpan');
                });
            });
        </script>
    @endpush --}}
@endsection
