@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <img src="{{ asset('assets/images/logo-unisa-01-300x300.png') }}" alt="SMA Negeri 1 Grobogan Logo"
                        class="brand-image img-circle elevation-3"
                        style="display: block; margin-left: auto; margin-right: auto;">
                </div>

                <div class="card-body">
                    <form method="post" id="add-user-form" class="form-horizontal" action="{{ route('register') }}">
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
                        <div class="form-group" id="form-nim">
                            <label class="col-form-label">NIM : </label>
                            <input type="text" name="nim" id="nim" class="form-control" required />
                        </div>
                        <div class="form-group" id=form-nidn>
                            <label class="col-form-label">NIDN : </label>
                            <input type="text" name="nidn" id="nidn" class="form-control" required />
                        </div>
                        {{-- <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input isCivitasUnisa" type="checkbox" id="isCivitasUnisa"
                                    name="civitasUnisa">
                                <label class="form-check-label">Civitas UNISA</label>
                            </div>
                        </div> --}}
                        {{-- <div class="form-group form-mapping-dosen">
                            <label>Mapping Data Dosen</label>
                            <select class="form-control mapping-dosen dosen_id" name="dosen_id" style="width: 100%;"
                                id="dosen">
                                @if (!empty($dosenOptions))
                                @foreach ($dosenOptions as $dosen)
                                @if (!empty($dosen['detail_person']))
                                <option value="{{ $dosen['kdperson'] }}">{{
                                    $dosen['detail_person']['namalengkap'] }}</option>
                                @endif
                                @endforeach
                                @endif
                            </select>
                        </div> --}}
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
                            <button type="submit" name="action_button" id="action-button" class="btn btn-primary">
                                Register </button>
                            @if (Route::has('login'))
                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Login
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
