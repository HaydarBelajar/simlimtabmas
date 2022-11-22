<div id="repeater-tim-usulan">
    <!--
        The value given to the data-repeater-list attribute will be used as the
        base of rewritten name attributes.  In this example, the first
        data-repeater-item's name attribute would become group-a[0][text-input],
        and the second data-repeater-item would become group-a[1][text-input]
    -->
    <div data-repeater-list="listanggotapengabdian" id="listanggotapengabdian">
        @forelse ($detailPengabdian['wewenang_usulan'] ?? [] as $wewenang_usulan)
        <div data-repeater-item>
            <div class="form-row align-items-center">
                <div class="form-group col-md-3">
                    <label>Nama Anggota</label>
                    <select class="form-control select2-anggota" id="nama-anggota" name="userId" required>
                        @foreach ($listUserPengusul as $userPengusul)
                        <option 
                            @if ($wewenang_usulan['user_id'] == $userPengusul['id']) selected @endif
                            value={{ $userPengusul['id'] }} data-nama-pengusul={{
                            $userPengusul['name'] }}>{{ $userPengusul['name'] }} ( {{ $userPengusul['full_name'] ?? '' }} )</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Peranan pengabdian</label>
                    <select 
                        class="custom-select" name="perananId"
                        id="peranan-pengabdian">
                        @foreach ($listPeranan as $peranan)
                        <option 
                            @if ($wewenang_usulan['wewenang'] == $peranan['peranan_id']) selected @endif
                            value="{{ $peranan['peranan_id'] }}" data-nama-peranan={{
                            $peranan['peranan_nama'] }}>{{ $peranan['peranan_nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Fakultas</label>
                    <select class="custom-select" name="fakultasId"
                        id="fakultas-pengabdian-anggota">
                        @foreach ($listFakultas as $fakultas)
                        <option 
                            @if ($wewenang_usulan['fakultas_id'] == $fakultas['kdfakultas']) selected @endif
                            data-nama-fakultas={{ $fakultas['namafakultas'] }} value={{
                            $fakultas['kdfakultas'] }}>{{ $fakultas['namafakultas'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    {{-- <input data-repeater-delete type="button" value="Delete"/> --}}
                    <button data-repeater-delete type="button" class="btn btn-danger" style="margin-top: 30px;">Hapus</button>
                </div>
            </div>
        </div>
        @empty
        <div data-repeater-item>
            <div class="form-row align-items-center">
                <div class="form-group col-md-3">
                    <label>Nama Anggota</label>
                    <select class="form-control select2-anggota" id="nama-anggota" name="userId" required>
                        @foreach ($listUserPengusul as $userPengusul)
                        <option 
                            value={{ $userPengusul['id'] }} data-nama-pengusul={{
                            $userPengusul['name'] }}>{{ $userPengusul['name'] }} ( {{ $userPengusul['full_name'] ?? '' }} )</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Peranan pengabdian</label>
                    <select 
                        class="custom-select" name="perananId"
                        id="peranan-pengabdian">
                        @foreach ($listPeranan as $peranan)
                        <option 
                            value="{{ $peranan['peranan_id'] }}" data-nama-peranan={{
                            $peranan['peranan_nama'] }}>{{ $peranan['peranan_nama'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label>Fakultas</label>
                    <select class="custom-select" name="fakultasId"
                        id="fakultas-pengabdian-anggota">
                        @foreach ($listFakultas as $fakultas)
                        <option 
                            data-nama-fakultas={{ $fakultas['namafakultas'] }} value={{
                            $fakultas['kdfakultas'] }}>{{ $fakultas['namafakultas'] }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    {{-- <input data-repeater-delete type="button" value="Delete"/> --}}
                    <button data-repeater-delete type="button" class="btn btn-danger" style="margin-top: 30px;">Hapus</button>
                </div>
            </div>
        </div>
        @endforelse
    </div>
    {{-- <input data-repeater-create type="button" value="Add"/> --}}
    <button data-repeater-create type="button" class="btn btn-primary">Tambah</button>
</div>
@push('scripts')
<!-- Repeater -->
<script src="{{ asset('assets/plugins/repeater/jquery-repeater.min.js') }}"></script>
<script>
    $(document).ready(function() {

    });
</script>
@endpush