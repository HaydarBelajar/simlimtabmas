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
                        <div class="top-button-group" style="margin-bottom: 20px;">
                            <a href={{ route('penelitian.tambah-penelitian') }} type="button" class="btn btn-primary tambah-penelitian">Tambah Usulan Penelitian</a>
                        </div>
                        <span id="notification"></span>
                        <table id="penelitian-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="25%">Judul Penelitian</th>
                                <th width="15%">Status Upload Pengesahan</th>
                                <th width="10%">Pengesahan</th>
                                <th width="15%">Status Upload Proposal</th>
                                <th width="10%">Proposal</th>
                                <th width="10%">Status Seleksi</th>
                                <th width="10%">Tanggal Upload</th>
                                <th width="10%">Aksi</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>

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
                                <h4 align="center" style="margin:0;">Apakah anda ingin menghapus data ini ?</h4>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="ok_delete_button" id="ok-delete-button" class="btn btn-danger">Ok</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Upload -->
                <div id="modalUpload" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Upload Pengesahan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                {{-- <form action="/target" class="dropzone" id="upload-file"></form> --}}
                                <div id="upload-file"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" name="ok_delete_button" id="ok-delete-button" class="btn btn-danger">Upload</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.Modal Upload -->
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @push('scripts')
        <script>
            $(document).ready(function () {
                // Dropzone Initialization
                // $("#upload-file").dropzone({ url: "/file/post" });
                // Dropzone('#upload-file').options.myGreatDropzone = { // camelized version of the `id`
                //     paramName: "file-usulan", // The name that will be used to transfer the file
                //     maxFilesize: 2, // MB
                //     maxFile: 1, // Total file uploaded
                //     accept: function(file, done) {
                //         if (file.name == "justinbieber.jpg") {
                //             done("Naha, you don't.");
                //         } else { 
                //             done(); 
                //         }
                //     },
                //     maxfilesexceeded: function(file) {
                //         this.removeAllFiles();
                //         this.addFile(file);
                //     }
                // };

                let myDropzone = new Dropzone('#upload-file', {
                    paramName: "file", // The name that will be used to transfer the file
                    maxFilesize: 2, // MB
                    url: "/file/post",
                    accept: function(file, done) {
                        if (file.name == "justinbieber.jpg") {
                        done("Naha, you don't.");
                        }
                        else { done(); }
                    }
                });

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
                                    <a href="#" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
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
                                    <a href="#" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
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
                    console.log(this);
                    $('#modalUpload').modal('show');
                    // DropZone


                    // $('#action_button').val('Simpan');
                    // $('#action').val('Simpan');
                });
            });
        </script>
    @endpush
@endsection
