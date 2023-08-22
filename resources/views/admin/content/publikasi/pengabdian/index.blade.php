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
                        {{-- @if (in_array('create penelitian',$user['permission_array']) && $upload_deadline->gt($now)) --}}
                        <a href="#" type="button" class="btn btn-primary tambah-penelitian">Tambah Luaran Penelitian</a>
                        {{-- @endif --}}
                        </div>
                    <span id="notification"></span>
                    <table id="penelitian-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%"></th>
                                <th width="5%">No</th>
                                <th width="20%">Jenis Luaran</th>
                                <th width="5%">Tahun</th>
                                <th width="15%">Aksi</th>
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

            <!-- Modal Upload -->
            <div id="modalUpload" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form enctype="multipart/form-data" action="" method="POST" id="upload-file">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-upload-title">Upload</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" id="id-penelitian" name="id_penelitian">
                                <input type="file" name="fileToUpload" id="fileToUpload">
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="o_upload_button" id="ok-upload-button" class="btn btn-danger"
                                    value="Upload">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
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
        /**
        * Section untuk menampilkan pesan response dari back end
        */
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
        * End Section untuk menampilkan pesan response dari back end
        */
        
    });
</script>
@endpush
@endsection