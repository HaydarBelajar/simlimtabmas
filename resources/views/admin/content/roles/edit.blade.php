@extends('admin.layout')
@extends('admin.header')
@extends('admin.body')
@extends('admin.footer')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Role</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard.home') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Role</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('admin.partials.notifications')
            <div class="row">

                <div class="col-sm-5">
                    <div class="card">
                        <form action="{{ route('roles.update', ['role' => $roleData['id']]) }}" method="POST">
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @endif" id="name"
                                        name="name" placeholder="Name" value="{{ old('name', $roleData['name']) }}">

                                    @error('name')
                                    <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <table class="table">
                                        <tbody>
                                            <thead>
                                                <tr>
                                                    <th>Modules</th>
                                                    <th>Permission</th>
                                                </tr>
                                            </thead>
                                            @foreach ($permissionData as $module => $permission)
                                            <tr>
                                                <td>
                                                    {{$module}}
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        @foreach ($permission as $item)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="permission_{{ $item['id'] }}" name="permission[]"
                                                                value="{{ $item['name'] }}" 
                                                                @foreach ($roleData['permissions'] as $permissionSelected)
                                                                    @if($item['id']==($permissionSelected['id']??'')) 
                                                                        checked 
                                                                    @endif 
                                                                @endforeach>
                                                            <label for="permission_{{ $item['id'] }}"
                                                                class="form-check-label">{{ $item['name'] }}</label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @error('name')
                                    <small class="text-danger"> {{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
                            <div class="card-footer">
                                <button class="btn btn-sm btn-outline-primary">Save</button>
                                <a href="{{ route('roles.index') }}"
                                    class="btn btn-sm btn-outline-secondary">Back</a>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection