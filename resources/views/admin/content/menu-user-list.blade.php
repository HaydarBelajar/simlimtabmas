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
                        <button type="button" class="btn btn-primary add-user">Tambah Pengguna baru</button>
                    </div>
                    <span id="notification"></span>
                    <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="35%">Nama pengguna</th>
                                <th width="35%">Email</th>
                                <th width="35%">Wewenang</th>
                                <th width="25%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="addModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="alert alert-danger" role="alert">
                                  This is a danger alert—check it out!
                                </div> -->
                            <form method="post" id="add-user-form" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Username : </label>
                                    <input type="text" name="username" id="username" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email : </label>
                                    <input type="email" name="email" id="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="custom-select" name="role" id="role">
                                        @if (!empty($rolesOptions))
                                        @foreach ($rolesOptions as $role)
                                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="isCivitasUnisa"
                                            name="civitasUnisa">
                                        <label class="form-check-label">Civitas UNISA</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mapping Data Dosen</label>
                                    <select class="form-control mapping-dosen" name="dosen_id" style="width: 100%;"
                                        id="dosen" required>
                                        @if (!empty($dosenOptions))
                                        @foreach ($dosenOptions as $dosen)
                                        <option value="{{ $dosen['kdperson'] }}">{{ $dosen['username'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class='form-password'>
                                    <div class="form-group">
                                        <label class="col-form-label">Password : </label>
                                        <input type="password" name="password" id="password" class="form-control"
                                            maxlength="35" required />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm Password : </label>
                                        <input type="password" name="confirmpassword" id="confirm-password"
                                            class="form-control" maxlength="35" required />
                                    </div>
                                </div>
                                <br />
                                <div class="modal-footer">
                                    <input type="hidden" name="action" id="action" value="Simpan" />
                                    <input type="submit" name="action_button" id="action-button" class="btn btn-primary"
                                        value="Simpan" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- <div class="alert alert-danger" role="alert">
                                  This is a danger alert—check it out!
                                </div> -->
                            <form method="post" id="edit-user-form" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <label class="col-form-label">Username : </label>
                                    <input type="text" name="username" id="username-edit" class="form-control"
                                        maxlength="11" required />
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email : </label>
                                    <input type="email" name="email" id="email-edit" class="form-control" maxlength="35"
                                        required />
                                </div>
                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="custom-select" name="role" id="role-edit">
                                        @if (!empty($rolesOptions))
                                        @foreach ($rolesOptions as $role)
                                        <option value="{{ $role['id'] }}">{{ $role['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" class="isCivitasUnisa"
                                            name="civitasUnisa">
                                        <label class="form-check-label">Civitas UNISA</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mapping Data Dosen</label>
                                    <select class="form-control mapping-dosen" name="dosen_id" style="width: 100%;"
                                        id="dosen-edit" required>
                                        @if (!empty($dosenOptions))
                                        @foreach ($dosenOptions as $dosen)
                                        <option value="{{ $dosen['kdperson'] }}">{{ $dosen['username'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class='form-password'>
                                    <div class="form-group">
                                        <label class="col-form-label">Password : </label>
                                        <input type="password" name="password" id="password-edit" class="form-control"
                                            maxlength="35" />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Confirm Password : </label>
                                        <input type="password" name="confirmpassword" id="confirm-password-edit"
                                            class="form-control" maxlength="35" />
                                    </div>
                                </div>
                                <br />
                                <div class="modal-footer">
                                    <input type="hidden" name="action" id="action-edit" value="Simpan" />
                                    <input type="hidden" name="user_id" id="user-id" value="Simpan" />
                                    <input type="submit" name="action_button" id="action-button=edit"
                                        class="btn btn-primary" value="Simpan" />
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
                            <h4 style="text-align: center" style="margin:0;">Apakah anda ingin menghapus data ini ?</h4>
                        </div>
                        <div class="modal-footer">
                            <button type="button" name="ok_delete_button" id="ok-delete-button"
                                class="btn btn-danger">Ok</button>
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
                /**
                * Form Trigger
                */
                $('input[type="checkbox"]').click(function(){
                    if ($('#isCivitasUnisa').is(":checked")) {
                        $('.form-password').hide();
                        $("#password").attr('required', false);
                        $("#confirm-password").attr('required', false);
                    } else {
                        $('.form-password').show();
                        $("#password").attr('required', true);
                        $("#confirm-password").attr('required', true);
                    }
                })

                /**
                * End Form Trigger
                */

                /**
                * Komponent dan Datatables
                */
                $('.mapping-dosen').select2({
                    theme: 'bootstrap4'
                })

                
                $('#user-table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: "{{ route('manage-user.get-all') }}",
                    },
                    columns: [
                        {
                            data: 'id',
                            name: 'No',
                            render: function ( data, type, row, meta ) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            }
                        },
                        {
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

                /**
                * End dan Datatables
                */

                /**
                * Create
                */

                $(document).on('click', '.add-user', function() {
                    $('#notification').html('');
                    $('#addModal').modal('show');
                });

                $('#add-user-form').on('submit', function(event) {
                    event.preventDefault();
                    var action_url = '';

                    action_url = "{{ route('manage-user.create') }}";
                    
                    $.ajax({
                        url: action_url,
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(data) {
                            var html = '';
                            if (data.error) {
                                html = '<div class="alert alert-danger">';
                                html += '<p>' + data.error + '</p>';
                                html += '</div>';
                            }else if (data.reason){
                                html = '<div class="alert alert-danger">';
                                html += '<p>' + data.reason + '</p>';
                                html += '</div>';
                            }

                            if (data.success) {
                                alert("Data telah sukses ditambahkan atau dirubah");
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#add-user-form')[0].reset();
                                $('#user-table').DataTable().ajax.reload();
                            }
                            $('#notification').html(html);
                            $('#addModal').modal('hide');
                            $('#editModal').modal('hide');
                        }
                    });
                });

                /**
                * End Create
                */

                /**
                * Edit
                */
                
                $(document).on('click', '.edit', function() {
                    var id = $(this).attr('id');
                    $('#notification').html('');
                    $.ajax({
                        method: "GET",
                        url: "/manage-user/get-user/" + id,
                        dataType: "json",
                        success: function(data) {
                            $('#addModal').modal('hide');
                            $('#username-edit').val(data.name);
                            $('#email-edit').val(data.email);
                            $('#role-edit').val(data.roles ? data.roles[0]['id'] : '');
                            $('#dosen-edit').val(data.dosen_id);
                            $('#user-id').val(id);
                            $('#editModal').modal('show');
                        },
                    error: function() {
                        alert("Error : Cannot get data");
                    }
                    })
                });

                $('#edit-user-form').on('submit', function(event) {
                    event.preventDefault();
                    var action_url = '';

                    action_url = "{{ route('manage-user.update') }}";

                    $.ajax({
                        url: action_url,
                        method: "POST",
                        data: $(this).serialize(),
                        dataType: "json",
                        success: function(data) {
                            console.log('asdasd', data);

                            var html = '';
                            if (data.error) {
                                html = '<div class="alert alert-danger">';
                                html += '<p>' + data.error + '</p>';
                                html += '</div>';
                            }else if (data.reason){
                                html = '<div class="alert alert-danger">';
                                html += '<p>' + data.reason + '</p>';
                                html += '</div>';
                            }

                            if (data.success) {
                                alert("Data telah sukses ditambahkan atau dirubah");
                                html = '<div class="alert alert-success">' + data.success + '</div>';
                                $('#edit-user-form')[0].reset();
                                $('#user-table').DataTable().ajax.reload();
                            }
                            $('#notification').html(html);
                            $('#addModal').modal('hide');
                            $('#editModal').modal('hide');
                            $('#edit-user-form')[0].reset();
                        }
                    });
                });
                /**
                * End Edit
                */


                /**
                * Delete
                */
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

                /**
                * End Delete
                */
            });
</script>
@endpush
@endsection