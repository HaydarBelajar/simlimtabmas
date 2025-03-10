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
									<i class="fa fa-bookmark"></i> {{ $detailPengabdian['judul'] ?? '' }}
									@if($detailPengabdian['status'] == 1)
									<span class="badge badge-success">Usulan Lolos</span>
									@else
									@if(Session::has('kucingku'))
									@if (in_array('do review pengabdian', $user['permission_array']))
									<button type="button" id='button-loloskan-usulan'
										data-id='{{ $detailPengabdian["usulan_id"] ?? '' }}'
										class="btn btn-danger btn-sm"><i class="fa fa-bell"></i> Loloskan
										Usulan</button>
									@endif
									@endif
									@endif
									<div class="float-right">
										<small>Tanggal Pengajuan : {{ \Carbon\Carbon::parse($detailPengabdian['created_at'] ?? '',  'Asia/Jakarta')->format('d-m-Y H:m:s') }}</small>
									</div>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							{{-- <div class="col-sm-4 invoice-col">
								<strong>Disetujui oleh : </strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['user_menyetujui']['detail_dosen']['username'] ?? ' - ' }}
								</p>
							</div> --}}
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Tahun Pelaksanaan</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['tahun_pelaksanaan'] ?
									$detailPengabdian['tahun_pelaksanaan']['tahun'] :
									'' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Jumlah Usulan Dana</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									<?php 
                          $amount = $detailPengabdian['jumlah_usulan_dana'] ?? '0' ;
                          $formatter = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                          echo($formatter->formatCurrency($amount, 'IDR'));
                        ?>
								</p>
							</div>
							<!-- /.col -->
						</div>
						<div class="row invoice-info">
							{{-- <div class="col-sm-4 invoice-col">
								<strong>Bidang Fokus</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['bidang_fokus'] ?? '' }}
								</p>
							</div> --}}
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Skema</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['skema'] ?
									$detailPengabdian['skema']['skema_nama'].' || Maksimal Biaya : Rp'.number_format($detailPengabdian['skema']['maks_biaya'] ?? '0'): '' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Durasi Kegiatan</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['durasi_kegiatan'] ? $detailPengabdian['durasi_kegiatan'] : ''
									}}
								</p>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- Anggota pengabdian column -->
							<div class="col-sm-4">
								<strong>Abstrak</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPengabdian['abstrak'] ?? '' }}
								</p>
							</div>

							<!-- /.col -->
							<div class="col-sm-4">
								<strong>Luaran pengabdian</strong>
								<ul>
									@foreach ($detailPengabdian['list_luaran'] ?? [] as $luaran)
									<li>{{ $luaran['capaian_luaran']['capaian_luaran_nama'] ?? '-' }}</li>
									@endforeach
								</ul>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
						<!-- row -->
						<div class="row">
							<!-- col -->
							<div class="col-sm-4">
								<strong>Anggota pengabdian</strong>
								<div class="table-responsive card" style="margin-top: 10px;">
									<table class="table">
										<tbody>
											@foreach ($detailPengabdian['wewenang_usulan'] as $team)
											<tr>
												<th>{{ $team['wewenang'] == 1 ? 'Ketua Pengusul' : 'Anggota' }}</th>
												<td>{{ $team['detail_pengusul']['name'] ? $team['detail_pengusul']['name'] : '' }}</td>
												<td>{{ $team['detail_pengusul']['roles'] ? $team['detail_pengusul']['roles'][0]['name'] : '' }}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<dl>
									{{-- <dt>Dokumen Pengesahan</dt>
									<dd>
										@if (isset($detailPengabdian['file_upload_pengesahan']))
										<a href="#" class="btn btn-outline-danger btn-sm upload-pengesahan"
											data-id="{{ $detailPengabdian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Reupload</a>
										<a class="btn btn-outline-primary btn-sm" target="_blank"
											href="{{ asset('media/pengesahan') }}/{{ $detailPengabdian['file_upload_pengesahan'] }}"><i
												class="fas fa-file-download"></i> Download</a>
										@else
										<a href="#" class="btn btn-outline-danger btn-sm upload-pengesahan"
											data-id="{{ $detailPengabdian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Upload</a>
										@endif
									</dd> --}}
									<dt>Dokumen Proposal</dt>
									<dd>
										{{-- <a class="btn btn-outline-success btn-sm" target="_blank"
											href="https://docs.google.com/document/d/1YJ2VXFFOMTkhkNnGOeHN4OaejuNnZG48/edit"><i
												class="fas fa-file-download"></i> Download Template</a> --}}
										@if (isset($detailPengabdian['file_upload_proposal']))
										{{-- <a href="#" class="btn btn-outline-danger btn-sm upload-proposal"
											data-id="{{ $detailPengabdian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Reupload</a> --}}
										<a class="btn btn-outline-primary btn-sm" target="_blank"
											href="{{ asset('media/proposal') }}/{{ $detailPengabdian['file_upload_proposal'] }}"><i
												class="fas fa-file-download"></i> Download</a>
										@else
										{{-- <a href="#" class="btn btn-outline-danger btn-sm upload-proposal"
											data-id="{{ $detailPengabdian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Upload</a> --}}
										@endif
									</dd>
									{{-- <dt>Dokumen Laporan Akhir</dt>
									<dd>
									</dd> --}}
								</dl>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
			<div class="row">
				<div class="col-12">
					<div class="card card-default color-palette-box">
						<div class="card-header">
							<h3 class="card-title">
								Catatan Harian pengabdian
							</h3>
						</div>
						<div class="card-body">
							<div class="top-button-group" style="margin-bottom: 20px;">
								<button type="button" class="btn btn-primary tambah-catatan-harian">Tambah Catatan
									Harian</button>
							</div>
							<span id="notification"></span>
							<table id="tabel-catatan-harian" class="table table-striped table-bordered"
								style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="25%">Tanggal Pelaksanaan</th>
										<th width="50%">Catatan</th>
										<th width="10%">Dokumen</th>
										<th width="10%">Aksi</th>
									</tr>
								</thead>
							</table>
						</div>
						<div class="card-body">
							<a href={{ route('pengabdian.data-pengabdian') }} type="button"
								class="btn btn-danger float-right">Kembali</a>
						</div>
					</div>
				</div>
			</div> <!-- /.row2 -->
			<div class="row">
				<div class="col-12">
					<div class="card card-default color-palette-box">
						<div class="card-header">
							<h3 class="card-title">
								Monev pengabdian
							</h3>
						</div>
						<div class="card-body">
							{{-- <div class="top-button-group" style="margin-bottom: 20px;"> --}}
								{{-- <button type="button" class="btn btn-primary tambah-catatan-harian">Tambah Catatan
									Monev</button> --}}
							{{-- </div> --}}
							<span id="notification"></span>
							<table id="tabel-catatan-harian" class="table table-striped table-bordered"
								style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="50%">Monev</th>
										{{-- <th width="25%">Tanggal Upload</th> --}}
										{{-- <th width="10%">Template</th> --}}
										<th width="10%">Upload</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="5%">1</th>
										<td width="50%">Monev 70%</th>
										{{-- <td width="25%">-</th> --}}
										{{-- <td width="10%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/document/d/11QIMtvBjaVLmdq3vIw1BErw702DswCnh/edit?rtpof=true"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th> --}}
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPengabdian['file_upload_laporan_70']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-70"
													data-id="{{ $detailPengabdian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/laporan-70') }}/{{ $detailPengabdian['file_upload_laporan_70'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit pengabdian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-70"
														data-id="{{ $detailPengabdian['usulan_id'] }}"><i
															class="fas fa-file-upload"></i>
														Upload</a>
													@endif
												@endif
											</div>
										</th>
									</tr>
									<tr>
										<td width="5%">2</th>
										<td width="50%">Monev 100% (Laporan Akhir)</th>
										{{-- <td width="25%">-</th> --}}
										{{-- <td width="10%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/document/d/11QIMtvBjaVLmdq3vIw1BErw702DswCnh/edit?rtpof=true"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th> --}}
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPengabdian['file_upload_laporan_akhir']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-akhir"
													data-id="{{ $detailPengabdian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/laporan-akhir') }}/{{ $detailPengabdian['file_upload_laporan_akhir'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit pengabdian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-akhir"
														data-id="{{ $detailPengabdian['usulan_id'] }}"><i
															class="fas fa-file-upload"></i>
														Upload</a>
													@endif
												@endif
											</div>
										</th>
									</tr>
									<tr>
										<td width="5%">3</th>
										<td width="50%">Kepuasan Mitra</th>
										{{-- <td width="25%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/spreadsheets/d/1fRYWzwzxodOB1UCq3OuzAwMb_cCNN-2u/edit#gid=1392405133"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th> --}}
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPengabdian['file_upload_kepuasan_mitra']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-kepuasan-mitra"
													data-id="{{ $detailPengabdian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/kepuasan-mitra') }}/{{ $detailPengabdian['file_upload_kepuasan_mitra'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit pengabdian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-kepuasan-mitra"
														data-id="{{ $detailPengabdian['usulan_id'] }}"><i
															class="fas fa-file-upload"></i>
														Upload</a>
													@endif
												@endif
											</div>
										</th>
									</tr>
									@php
									$i = 3;
									@endphp
									@foreach ($detailPengabdian['list_luaran'] ?? [] as $luaran)
									<tr>
										<td width="5%">{{$i}}</th>
										<td width="50%">{{ $luaran['capaian_luaran']['capaian_luaran_nama'] ?? '-' }}</th>
										<td width="10%">
											<a href="#" class="berkas-luaran" id="berkas" data-type="text" data-pk="{{ $luaran['luaran_id'] }}" data-url="{{ route('luaran.update', $luaran['luaran_id']) }}" data-title="Url Luaran">{{ $luaran['berkas'] ?? ' - ' }}</a>
										</th>
									</tr>
									@php
									$i++;
									@endphp
									@endforeach
									{{-- <tr>
										<td width="5%">3</th>
										<td width="50%">Monev Luaran</th>
										<td width="25%">-</th>
										<td width="10%">
											<div class="btn-group">
											</div>
										</th>
									</tr> --}}
								</tbody>
							</table>
						</div>
						<div class="card-body">
							<a href={{ route('pengabdian.data-pengabdian') }} type="button"
								class="btn btn-danger float-right">Kembali</a>
						</div>
					</div>
				</div>
			</div> <!-- /.row2 -->
			
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
	<!-- Modal -->
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

	<div id="confirmLolosUsulanModal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Konfirmasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h6 style="margin:0; text-align: center;">Apakah anda ingin meloloskan usulan ini ?</h6>
				</div>
				<div class="modal-footer">
					<button type="button" name="ok_loloskan_usulan" id="lolos-usulan-button"
						class="btn btn-danger">Ok</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
				</div>
			</div>
		</div>
	</div>

	<div id="form-catatan-harian-modal" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Catatan Harian</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="form-result"></span>
					<!-- <div class="alert alert-danger" role="alert">
                  This is a danger alert—check it out!
                </div> -->
					<form method="post" id="form-catatan-harian" class="form-horizontal" enctype="multipart/form-data">
						@csrf
						<div class="form-group">
							<label class="col-form-label">Tanggal Pelaksanaan : </label>
							<div class="input-group date" id="reservationdate" data-target-input="nearest">
								<input type="text" class="form-control datetimepicker-input"
									data-target="#reservationdate" name='tanggal_pelaksanaan' required />
								<div class="input-group-append" data-target="#reservationdate"
									data-toggle="datetimepicker">
									<div class="input-group-text"><i class="fa fa-calendar"></i></div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-form-label">Catatan : </label>
							<textarea name="deskripsi" id="deskripsi" class="form-control" rows="2" required></textarea>
						</div>
						<div class="form-group">
							<label class="col-form-label">Upload Berkas : </label>
							<input type="file" name="fileToUpload" id="fileToUpload" required>
						</div>
						<br />
						<div class="modal-footer">
							<input type="hidden" class="id-pengabdian" name="id_pengabdian">
							<input type="hidden" id="id-catatan-pengabdian" name="id_catatan_pengabdian">
							<input type="hidden" name="action" id="action" value="Simpan" />
							<input type="submit" name="action_button" id="action-button" class="btn btn-primary"
								value="Simpan" />
						</div>
					</form>
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
						<input type="hidden" class="id-pengabdian" name="id_pengabdian">
						<input type="file" name="fileToUpload" id="fileToUpload" required>
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
	<!-- /.Modal -->
</div>
<!-- /.content-wrapper -->
@push('scripts')
<script>
	/**
	 * Init X-Editable
	 * */
	$.fn.editable.defaults.mode = 'inline';
	$.fn.editable.defaults.params = function (params) {
        params._token = $("meta[name=csrf-token]").attr("content");
        return params;
    };
	$.fn.editable.defaults.ajaxOptions = {type: "PUT"};

	$(document).ready(function () {
		$(document).ready(function() {
			$('.berkas-luaran').editable();
		});

		let catatanPengabdianID;
		let kucingkuId = $('#kucingku-id').val();
		/**
		* Loloskan Usulan Function
		*
		*/
		$(document).on('click', '#button-loloskan-usulan', function() {
			catatanPengabdianID = $(this).attr('data-id');
			$('#confirmLolosUsulanModal').modal('show');
		});

		$('#lolos-usulan-button').click(function() {
			$.ajax({
				url: "/pengabdian/update-status-pengabdian/" + catatanPengabdianID,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
					"status": "1",
					"user_menyetujui_id": kucingkuId,
				},
				beforeSend: function() {
					$('#lolos-usulan-button').text('Proses Meloloskan Usulan...');
				},
				success: function(data) {
					if (data.errors) {
					alert(data.errors);
					$('#confirmLolosUsulanModal').modal('hide');
					$('#lolos-usulan-button').text('Ok');
					}
					if (data.success) {
					alert(data.success);
					$('#confirmLolosUsulanModal').modal('hide');
					location.reload();
					}
				}
			})
		});

		/**
		* End Loloskan Usulan Function
		*
		*/

		$(document).on('click', '.tambah-catatan-harian', function() {
			$('#form-result').html('');
			$('#form-catatan-harian-modal').modal('show');
			$('#action-button').val('Simpan');
			$('#action').val('Simpan');
			$('.id-pengabdian').val("{{ $detailPengabdian['usulan_id'] ?? '' }}");
		});

		$('#reservationdate').datetimepicker({
		format: 'L'
		});

		/**
		* Add Function
		*
		*/
		$('#form-catatan-harian').on('submit', function(event) {
			event.preventDefault();
			var action_url = '';

			if ($('#action').val() == 'Simpan') {
				action_url = "{{ route('pengabdian.tambah-catatan-harian') }}";
			}

			if ($('#action').val() == 'Edit') {
				action_url = "{{ route('pengabdian.edit-catatan-harian') }}";
			}

			$.ajax({
				url: action_url,
				method: "POST",
				data: new FormData(this),
				processData: false,
				contentType: false,
				dataType: "json",
				success: function(data) {
				var html = '';
				if (data.errors) {
					alert("Data gagal ditambahkan atau dirubah !");
					html = `<div class="alert alert-danger"> ${data.errors} </div>`;
				}
				if (data.success) {
					alert("Data successfully added or edited !");
					html = '<div class="alert alert-success">' + data.success + '</div>';
					$('#form-catatan-harian')[0].reset();
					$('#tabel-catatan-harian').DataTable().ajax.reload();
					$('#form-catatan-harian-modal').modal('hide');
				}
				$('#form-result').html(html);
				}
			});
		});
		/**
		* End Add Function
		*
		*/

		// Ketika Tombol Edit Diklick
		$(document).on('click', '.edit', function() {
		var id = $(this).attr('id');

		$('#form-result').html('');
		$('#form-catatan-harian-modal').modal('show');
		$("#edit-form :input").attr("disabled", false);
		$('.edit-content').hide();
		$(".edit-content :input").prop('required', false);
		});


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
		* Delete Function
		*
		*/
		$(document).on('click', '.delete', function() {
			catatanPengabdianID = $(this).attr('id');
			$('#confirmModal').modal('show');
		});

		$('#ok-delete-button').click(function() {
			$.ajax({
				url: "/pengabdian/hapus-catatan-harian/" + catatanPengabdianID,
				method: "GET",
				data: {
					"_token": "{{ csrf_token() }}",
				},
				beforeSend: function() {
					$('#ok-delete-button').text('Proses Menghapus...');
				},
				success: function(data) {
					var html = '';
					if (data.errors) {
					alert("Data gagal dihapus !");
					html = `<div class="alert alert-danger"> ${data.errors} ! </div>`;
					}
					if (data.success) {
					alert("Data successfully added or edited !");
					html = '<div class="alert alert-success">' + data.success + '</div>';
					$('#tabel-catatan-harian').DataTable().ajax.reload();
					$('#confirmModal').modal('hide');
					}
					$('#form-result').html(html);
				}
			})
		});
		/**
		* End Delete Function
		*
		*/

		$('#tabel-catatan-harian').DataTable({
			"scrollX": true,
			processing: true,
			serverSide: true,
			ajax: {
				url: "{{ route('pengabdian.get-catatan-harian', $detailPengabdian['usulan_id']) }}",
			},
			columns: [
				{
					data: 'catatan_pengabdian_id',
					name: 'No',
					render: function ( data, type, row, meta ) {
						return meta.row + meta.settings._iDisplayStart + 1;
					}
				},
				{
					data: 'tanggal_pelaksanaan',
					name: 'Tanggal Pelaksanaan',
					render: function ( data, type, row ) {
						return moment(data).tz('Asia/Jakarta').format('DD-MM-YYYY');
					}
				},
				{
					data: 'deskripsi',
					name: 'Catatan'
				},
				{
					name: 'Dokumen',
					data: 'berkas',
					className: 'text-right py-0 align-middle',
					render: function ( data, type, row ) {
						return `<div class="btn-group btn-group-sm">
							<a target="_blank" href="{{ asset('media/catatanHarian') }}/${row.berkas}" class="btn btn-danger"><i class="fas fa-file-download"></i></a>
						</div>`;
						// return 'asdasd';
					}
				},
				{
					data: 'action',
					name: 'action',
					orderable: false
				}
			]
		});
	});

	/**
	* Upload Dokumen
	*
	**/
	$(document).on('click', '.upload-proposal, .upload-pengesahan, .upload-laporan-akhir, .upload-laporan-70, .upload-kepuasan-mitra', function() {
		$('#modalUpload').modal('show');
		let isUploadProposal = false;
		let isUploadPengesahan = false;
		let isUploadLaporanAkhir = false;
		let isUploadLaporan70 = false;
		let kepuasanMitra = false;
		let url = '';
		const id = $(this).data("id")

		var classList = this.classList.toString();

		$('.id-pengabdian').val(id);
		if (classList.includes('upload-proposal')){
			isUploadProposal = true;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			url = "/pengabdian/upload-proposal";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Proposal');
		}
		if (classList.includes('upload-pengesahan')){
			isUploadProposal = false;
			isUploadPengesahan = true;
			isUploadLaporanAkhir = false;
			url = "/pengabdian/upload-pengesahan";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Pengesahan');
		}
		if (classList.includes('upload-laporan-akhir')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = true;
			url = "/pengabdian/upload-laporan-akhir";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Laporan Akhir');
		}
		if (classList.includes('upload-laporan-70')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = true;
			kepuasanMitra = false;
			url = "/pengabdian/upload-laporan-70";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Laporan Kemujuan 70%');
		}
		if (classList.includes('upload-kepuasan-mitra')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = true;
			kepuasanMitra = false;
			url = "/pengabdian/upload-kepuasan-mitra";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Laporan Kepuasan Mitra');
		}
	});
	/**
	* End Upload Dokumen
	*
	**/
</script>
@endpush
@endsection