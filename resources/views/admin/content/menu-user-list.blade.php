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
                    <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="35%">Nama pengguna</th>
                                <th width="35%">Email</th>
                                <th width="35%">Wewenang</th>
                                <th width="30%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="formModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah pengguna baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <span id="form-result"></span>
                            <!-- <div class="alert alert-danger" role="alert">
                This is a danger alert—check it out!
              </div> -->
                            <form method="post" id="edit-form" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Nama pengguna : </label>
                                    <input type="text" name="username" id="username" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email : </label>
                                    <input type="text" name="email" id="email" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Wewenang : </label>
                                    <select class="custom-select" name="role" id="role">
                                        <option selected>Role List</option>
                                        @if (!empty($roleList))
                                        @foreach ($roleList as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                  <label class="col-form-label">Password : </label>
                  <input type="password" name="password" id="password" class="form-control" />
                </div>
                <div class="form-group">
                  <label class="col-form-label">Confirm Password : </label>
                  <input type="password" name="confirmPassword" id="confirm-password" class="form-control" />
                </div> -->
                                <br />
                                <div class="modal-footer">
                                    <input type="hidden" name="action" id="action" value="Add" />
                                    <input type="hidden" name="user_id" id="user-id" />
                                    <input type="submit" name="action_button" id="action_button" class="btn btn-primary"
                                        value="Add" />
                                </div>
                            </form>
                        </div>
                    </div>
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
                            <button type="button" name="ok_button" id="ok-button" class="btn btn-danger">Ok</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
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
        $('#user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('manage-user.get-all') }}",
            },
            columns: [{
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'roles[0].name',
                name: 'roles[0].name'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });
    });

    function buildAjaxData() {
        var settings = $("#user-table").dataTable().fnSettings();

        var obj = {
            //default params
            "draw": settings.iDraw,
            // "start" : settings._iDisplayStart,
            // "length" : settings._iDisplayLength,
            // "columns" : "",
            // "order": "",

            // "cmd" : "refresh",
            // "from": $("#from-date").val()+" "+$("#from-time").val(),
            // "to"  : $("#to-date").val()+" "+$("#to-time").val()
        };

        //building the columns
        // var col = new Array(); // array

        // for (var index in settings.aoColumns) {
        //     var data = settings.aoColumns[index];
        //     col.push(data.sName);

        // }

        // var ord = {
        //     "column": settings.aLastSort[0].col,
        //     "dir": settings.aLastSort[0].dir
        // };

        //assigning
        // obj.columns = col;
        // obj.order = ord;

        return obj;


    }
</script>
@endpush
@endsection