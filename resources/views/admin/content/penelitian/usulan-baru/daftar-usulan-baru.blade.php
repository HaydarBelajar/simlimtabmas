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
                        <div class="alert alert-danger" role="alert">
                            Usulan ditutup Tanggal {{\Carbon\Carbon::parse($setting['date_value'] ?? '', 'Asia/Jakarta')->format('d-M-Y H:i')}}
                        </div>
                        @php
                            $upload_deadline = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $setting['date_value'] ?? null);
                            $now = \Carbon\Carbon::now('Asia/Jakarta');
                        @endphp
                        @if (in_array('create penelitian',$user['permission_array']) && $upload_deadline->gt($now))
                        <a href={{ route('penelitian.tambah-penelitian') }} type="button" class="btn btn-primary tambah-penelitian">Tambah Usulan Penelitian</a>
                        @endif
                        </div>
                    <span id="notification"></span>
                    <table id="penelitian-table" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th width="5%"></th>
                                <th width="5%">No</th>
                                <th width="20%">Judul Penelitian</th>
                                <th width="5%">Tahun Usulan</th>
                                {{-- <th width="5%">Tahun Pelaksanaan</th> --}}
                                {{-- <th width="10%">Fakultas</th> --}}
                                <th width="10%">Skema</th>
                                {{-- <th width="10%">Ketua</th> --}}
                                {{-- <th width="5%">Pengesahan</th> --}}
                                <th width="5%">Proposal</th>
                                <th width="5%">Penilaian Reviewer</th>
                                <th width="5%">Revisi Proposal</th>
                                {{-- <th width="5%">Laporan Akhir</th> --}}
                                <th width="5%">Status Seleksi</th>
                                <th width="10%">Tanggal Upload</th>
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
                                <input type="hidden" id="username-ketua-usulan" name="username_ketua_usulan">
                                <input type="file" name="fileToUpload" id="fileToUpload" accept="application/pdf,application/vnd.ms-excel">
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
        
        /**
        * Section untuk melakukan delete jika tombol delete di setiap row table di klick
        */ 
        $(document).on('click', '.delete', function() {
            usulan_id = $(this).attr('id');
            $('#confirmModal').modal('show');
        });

        $('#ok-delete-button').click(function() {
            $.ajax({
                url: "/penelitian/delete/" + usulan_id,
                method: "GET",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                beforeSend: function() {
                    $('#ok-delete-button').text('Proses Menghapus...');
                },
                success: function(data) {
                    setTimeout(function() {
                        if (data.errors || data.status_code > 400) {
                            $('#confirmModal').modal('hide');
                            $('#penelitian-table').DataTable().ajax.reload();
                            alert(data.errors);
                        } else {
                            $('#confirmModal').modal('hide');
                            $('#penelitian-table').DataTable().ajax.reload();
                            alert('Data Sukses Terhapus');
                        }
                    }, 2000);
                }
            })
        });

        /**
        * End Section untuk melakukan delete jika tombol delete di setiap row table di klick
        */

        /**
        * Section untuk menampilkan data dalam bentuk datatables
        */

        function detailedRow ( d ) {
            const wewenang1 = d.wewenang_usulan.find( ({wewenang}) => wewenang == 1 ) !== undefined ? d.wewenang_usulan.find( ({wewenang}) => wewenang == 1 ).detail_pengusul.name : ' - ';
            const wewenang2 = d.wewenang_usulan.find( ({wewenang}) => wewenang == 2 ) !== undefined ? d.wewenang_usulan.find( ({wewenang}) => wewenang == 2 ).detail_pengusul.name : ' - ';
            const wewenang3 = d.wewenang_usulan.find( ({wewenang}) => wewenang == 3 ) !== undefined ? d.wewenang_usulan.find( ({wewenang}) => wewenang == 3 ).detail_pengusul.name : ' - ';
            const wewenang4 = d.wewenang_usulan.find( ({wewenang}) => wewenang == 4 ) !== undefined ? d.wewenang_usulan.find( ({wewenang}) => wewenang == 4 ).detail_pengusul.name : ' - ';
            // `d` is the original data object for the row
            return '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;">'+
                '<tr>'+
                    '<td>Ketua</td>'+
                    '<td>'+ wewenang1 +'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Anggota 1</td>'+
                    '<td>'+ wewenang2 +'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Anggota 2</td>'+
                    '<td>'+ wewenang3 +'</td>'+
                '</tr>'+
                '<tr>'+
                    '<td>Anggota 3</td>'+
                    '<td>'+ wewenang4 +'</td>'+
                '</tr>'+
            '</table>';
        }

        let tabelPenelitian = $('#penelitian-table').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf'
            ],
            "scrollX": true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('penelitian.get-all') }}",
            },
            columns: [
                {
                    "className":      'dt-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                {
                    data: 'usulan_id',
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
                    data: 'tahun.tahun',
                    name: 'Tahun Usulan'
                },
                // {
                //     data: 'tahun_pelaksanaan.tahun',
                //     name: 'Tahun Pelaksanaan'
                // },
                // {
                //     data: 'fakultas',
                //     name: 'Fakultas',
                //     render: function ( data, type, row ) {
                //         if (data) {
                //             return data.namafakultas;
                //         } else {
                //             return '-';
                //         }

                //     }
                // },
                {
                    data: 'skema',
                    name: 'Skema',
                    render: function ( data, type, row ) {
                        if (data) {
                            return data.skema_nama;
                        } else {
                            return '-';
                        }

                    }
                },
                // {
                //     data: 'wewenang_usulan',
                //     name: 'Ketua',
                //     render: function ( data, type, row ) {
                //         if (data.length){
                //             const ketua = data.find( ({wewenang}) => wewenang == 1 ) !== undefined ? data.find( ({wewenang}) => wewenang == 1 ).detail_pengusul?.name ?? ' - ' : ' - ';
                //             return ketua;
                //         }
                //         return '-';
                //     }
                // },
                // {
                //     name: 'Pengesahan',
                //     data: 'usulan_id',
                //     className: 'text-right py-0 align-middle',
                //     render: function ( data, type, row ) {
                //         if (row.file_upload_pengesahan) {
                //             return `
                //                 <a class="btn btn-outline-primary btn-block btn-sm" target="_blank" href="{{ asset('media/pengesahan') }}/${row.file_upload_pengesahan}" ><i class="fas fa-file-download"></i> Download</a>
                //             `;
                //         } else {
                //             return `
                //                 <a href="#" class="btn btn-outline-danger btn-block btn-sm upload-pengesahan" data-id="${data}"><i class="fas fa-file-upload"></i> Upload</a>
                //             `;
                //         }

                //     }
                // },
                {
                    name: 'Proposal',
                    data: 'usulan_id',
                    className: 'text-right py-0 align-middle',
                    render: function ( data, type, row ) {
                        if (row.file_upload_proposal) {
                            return `
                            <a  class="btn btn-outline-primary btn-block btn-sm" target="_blank" href="{{ asset('media/proposal') }}/${row.file_upload_proposal}" ><i class="fas fa-file-download"></i> Download</a>
                            `;
                        } else {
                            return '';
                            return `
                            <a href="#" class="btn btn-outline-danger btn-block btn-sm upload-proposal" data-username-ketua-usulan="${row.user.name}" data-id="${data}"><i class="fas fa-file-upload"></i> Upload</a>
                            `;
                        }

                    }
                },
                {
                    name: 'Penilaian Reviewer',
                    data: 'usulan_id',
                    className: 'text-right py-0 align-middle',
                    render: function ( data, type, row ) {
                        if (row.file_upload_penilaian_penelitian_reviewer) {
                            return `
                                <a class="btn btn-outline-primary btn-block btn-sm" target="_blank" href="{{ asset('media/proposal-revisi') }}/${row.file_upload_proposal_revisi}" ><i class="fas fa-file-download"></i> Download</a>
                            `;
                        } else {
                            return `-`;
                        }

                    }
                },
                {
                    name: 'Proposal Revisi',
                    data: 'usulan_id',
                    className: 'text-right py-0 align-middle',
                    render: function ( data, type, row ) {
                        if (row.file_upload_proposal_revisi) {
                            return `
                                <a class="btn btn-outline-primary btn-block btn-sm" target="_blank" href="{{ asset('media/proposal-revisi') }}/${row.file_upload_proposal_revisi}" ><i class="fas fa-file-download"></i> Download</a>
                                `;
                                // <a href="#" class="btn btn-outline-danger btn-block btn-sm upload-proposal-revisi" data-username-ketua-usulan="${row.user.name}" data-id="${data}"><i class="fas fa-file-upload"></i> Re-Upload</a>
                        } else {
                            return `
                                <a href="#" class="btn btn-outline-danger btn-block btn-sm upload-proposal-revisi" data-username-ketua-usulan="${row.user.name}" data-id="${data}"><i class="fas fa-file-upload"></i> Upload</a>
                            `;
                        }

                    }
                },
                // {
                //     name: 'Laporan Akhir',
                //     data: 'usulan_id',
                //     className: 'text-right py-0 align-middle',
                //     render: function ( data, type, row ) {
                //         if (row.file_upload_laporan_akhir) {
                //             return `
                //             <a  class="btn btn-outline-primary btn-block btn-sm" target="_blank" href="{{ asset('media/laporan-akhir') }}/${row.file_upload_laporan_akhir}" ><i class="fas fa-file-download"></i> Download</a>
                //             `;
                //         } else {
                //             return `
                //             <a href="#" class="btn btn-outline-danger btn-block btn-sm upload-laporan-akhir" data-id="${data}"><i class="fas fa-file-upload"></i> Upload</a>
                //             `;
                //         }

                //     }
                // },
                {
                    data: 'status',
                    name: 'Status Seleksi',
                    render: function ( data, type, row ) {
                        if (data == 0) {
                            return `Menunggu`;
                        } else if (data == 1) {
                            return `Lolos`;
                        }
                    }
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

        $('#penelitian-table tbody').on('click', 'td.dt-control', function () {
            var tr = $(this).closest('tr');
            var row = tabelPenelitian.row( tr );
    
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                if (row.data().wewenang_usulan.length > 0){
                    row.child( detailedRow(row.data()) ).show();
                    tr.addClass('shown');
                }
            }
        });

        /**
        * End Section untuk menampilkan data dalam bentuk datatables
        */

        $(document).on('click', '.upload-proposal, .upload-pengesahan, .upload-laporan-akhir, .upload-proposal-revisi', function() {
            $('#modalUpload').modal('show');
            let isUploadProposal = false;
            let isUploadPengesahan = false;
            let isUploadLaporanRevisi = false;
            let isUploadLaporanAkhir = false;
            let url = '';
            const id = $(this).data("id")
            const usernameKetuaUsulan = $(this).data("username-ketua-usulan")

            var classList = this.classList.toString();

            $('#id-penelitian').val(id);
            $('#username-ketua-usulan').val(usernameKetuaUsulan);
            if (classList.includes('upload-proposal')){
                isUploadProposal = true;
                isUploadPengesahan = false;
                url = "/penelitian/upload-proposal";
                $('#upload-file').attr('action', url);
                $('#modal-upload-title').html('Upload Proposal');
            }
            if (classList.includes('upload-pengesahan')){
                isUploadProposal = false;
                isUploadPengesahan = true;
                url = "/penelitian/upload-pengesahan";
                $('#upload-file').attr('action', url);
                $('#modal-upload-title').html('Upload Pengesahan');
            }
            if (classList.includes('upload-laporan-akhir')){
                isUploadProposal = false;
                isUploadPengesahan = false;
                isUploadLaporanAkhir = true;
                url = "/penelitian/upload-laporan-akhir";
                $('#upload-file').attr('action', url);
                $('#modal-upload-title').html('Upload Laporan Akhir');
            }
            if (classList.includes('upload-proposal-revisi')){
                isUploadProposal = false;
                isUploadPengesahan = false;
                isUploadProposalRevisi = true;
                isUploadLaporanAkhir = false;
                url = "/penelitian/upload-proposal-revisi";
                $('#upload-file').attr('action', url);
                $('#modal-upload-title').html('Upload Proposal Revisi');
            }
        });
    });
</script>
@endpush
@endsection