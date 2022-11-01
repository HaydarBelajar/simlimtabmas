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
                
                @include('admin.partials.notifications')
                <div class="card-body">
                    <form method="post" id="add-user-form" class="form-horizontal" action="{{ route('do-register') }}">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Username : </label>
                            <input type="text" name="username" id="username" value="{{ old('username') }}" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Nama Lengkap : </label>
                            <input type="text" name="full_name" id="fullname" value="{{ old('full_name') }}" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email : </label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="custom-select" name="role" id="role-select" required>
                                @if (!empty($rolesOptions))
                                <option disabled selected>Pilih role</option>
                                @foreach ($rolesOptions as $role)
                                @if ($role['id'] != 1 && $role['id'] != 14)
                                <option 
                                    value="{{ $role['id'] }}"
                                    @if(old('role') == $role['id']) selected @endif
                                >{{ $role['name'] }}</option>
                                @endif
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group" id="form-nim">
                            <label class="col-form-label">NIM : </label>
                            <input type="text" name="nim" id="nim" value="{{ old('nim') }}" class="form-control" />
                        </div>
                        <div class="form-group" id=form-nidn>
                            <label class="col-form-label">NIDN : </label>
                            <input type="text" name="nidn" id="nidn" value="{{ old('nidn') }}" class="form-control" />
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
@push('scripts')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#form-nim').hide();
        $('#form-nidn').hide();
        /**
        * Form Trigger
        */
        $('#role-select').on('change', function(e){
            let selectedText = ($("option:selected", this).text()).toLowerCase();
            console.log(selectedText);
            if (selectedText == 'mahasiswa') {
                $('#form-nidn').hide();
                $('#form-nim').show();
            } else {
                $('#form-nidn').show();
                $('#form-nim').hide();
            }
        })
    })
</script>
@endpush
@endsection

