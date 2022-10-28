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
									<i class="fa fa-bookmark"></i> {{ $detailPenelitian['judul'] ?? '' }}
									@if($detailPenelitian['status'] == 1)
									<span class="badge badge-success">Usulan Lolos</span>
									@else
									@if(Session::has('kucingku'))
									@if (in_array('do review penelitian', $user['permission_array']))
									<button type="button" id='button-loloskan-usulan'
										data-id='{{ $detailPenelitian["usulan_id"] ?? '' }}'
										class="btn btn-danger btn-sm"><i class="fa fa-bell"></i> Loloskan
										Usulan</button>
									@endif
									@endif
									@endif
									<div class="float-right">
										<small>Tanggal Upload: 2/10/2014</small>
									</div>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<strong>Disetujui oleh : </strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['user_menyetujui']['detail_dosen']['username'] ?? ' - ' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Tahun Pelaksanaan</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['tahun_pelaksanaan'] ?
									$detailPenelitian['tahun_pelaksanaan']['tahun'] :
									'' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Jumlah Usulan Dana</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									<?php 
                          $amount = $detailPenelitian['jumlah_usulan_dana'] ?? '0' ;
                          $formatter = new NumberFormatter('id-ID',  NumberFormatter::CURRENCY);
                          echo($formatter->formatCurrency($amount, 'IDR'));
                        ?>
								</p>
							</div>
							<!-- /.col -->
						</div>
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								<strong>Bidang Fokus</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['bidang_fokus'] ?? '' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Sumber Dana</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['sumber_dana'] ?
									$detailPenelitian['sumber_dana']['sumber_dana_nama'] : '' }}
								</p>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<strong>Durasi Kegiatan</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['durasi_kegiatan'] ? $detailPenelitian['durasi_kegiatan'] : ''
									}}
								</p>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<div class="row">
							<!-- Anggota penelitian column -->
							<div class="col-sm-4">
								<strong>Abstrak</strong>
								<p class="well well-sm shadow-none" style="margin-top: 10px;">
									{{ $detailPenelitian['abstrak'] ?? '' }}
								</p>
							</div>

							<!-- /.col -->
							<div class="col-sm-4">
								<strong>Luaran Penelitian</strong>
								<ul>
									@foreach ($detailPenelitian['capaian_luaran'] as $capaianLuaran)
									<li>{{ $capaianLuaran['capaian_luaran_nama'] }}</li>
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
								<strong>Anggota Penelitian</strong>
								<div class="table-responsive card" style="margin-top: 10px;">
									<table class="table">
										<tbody>
											<tr>
												<th>Peneliti Utama</th>
												<td>{{ $detailPenelitian['peneliti_utama']['name'] ?? ' - ' }}</td>
											</tr>
											<tr>
												<th>Anggota 1</th>
												<td>{{ $detailPenelitian['anggota1']['name'] ?? ' - ' }}</td>
											</tr>
											<tr>
												<th>Anggota 2</th>
												<td>{{ $detailPenelitian['anggota2']['name'] ?? ' - ' }}</td>
											</tr>
											<tr>
												<th>Anggota 3</th>
												<td>{{ $detailPenelitian['anggota3']['name'] ?? ' - ' }}</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<!-- /.col -->
							<div class="col-sm-4">
								<dl>
									<dt>Dokumen Pengesahan</dt>
									<dd>
										@if (isset($detailPenelitian['file_upload_pengesahan']))
										<a href="#" class="btn btn-outline-danger btn-sm upload-pengesahan"
											data-id="{{ $detailPenelitian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Reupload</a>
										<a class="btn btn-outline-primary btn-sm" target="_blank"
											href="{{ asset('media/pengesahan') }}/{{ $detailPenelitian['file_upload_pengesahan'] }}"><i
												class="fas fa-file-download"></i> Download</a>
										@else
											@if (in_array('edit penelitian',$user['permission_array']))
											<a href="#" class="btn btn-outline-danger btn-sm upload-pengesahan"
												data-id="{{ $detailPenelitian['usulan_id'] }}"><i
													class="fas fa-file-upload"></i>
												Upload</a>
											@endif
										@endif
									</dd>
									<dt>Dokumen Proposal</dt>
									<dd>
										<a class="btn btn-outline-success btn-sm" target="_blank"
											href="https://docs.google.com/document/d/1YJ2VXFFOMTkhkNnGOeHN4OaejuNnZG48/edit"><i
												class="fas fa-file-download"></i> Download Template</a>
										@if (isset($detailPenelitian['file_upload_proposal']))
										<a href="#" class="btn btn-outline-danger btn-sm upload-proposal"
											data-id="{{ $detailPenelitian['usulan_id'] }}"><i
												class="fas fa-file-upload"></i>
											Reupload</a>
										<a class="btn btn-outline-primary btn-sm" target="_blank"
											href="{{ asset('media/proposal') }}/{{ $detailPenelitian['file_upload_pengesahan'] }}"><i
												class="fas fa-file-download"></i> Download</a>
										@else
											@if (in_array('edit penelitian',$user['permission_array']))
											<a href="#" class="btn btn-outline-danger btn-sm upload-proposal"
												data-id="{{ $detailPenelitian['usulan_id'] }}"><i
													class="fas fa-file-upload"></i>
												Upload</a>
											@endif
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
								Catatan Harian Penelitian
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
							<a href={{ route('penelitian.data-penelitian') }} type="button"
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
								Monev Penelitian
							</h3>
						</div>
						<div class="card-body">
							<div class="top-button-group" style="margin-bottom: 20px;">
								{{-- <button type="button" class="btn btn-primary tambah-catatan-harian">Tambah Catatan
									Monev</button> --}}
							</div>
							<span id="notification"></span>
							<table id="tabel-catatan-harian" class="table table-striped table-bordered"
								style="width:100%">
								<thead>
									<tr>
										<th width="5%">No</th>
										<th width="50%">Monev</th>
										{{-- <th width="25%">Tanggal Upload</th> --}}
										<th width="10%">Template</th>
										<th width="10%">Upload</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td width="5%">1</th>
										<td width="50%">Monev 70%</th>
										{{-- <td width="25%">-</th> --}}
										<td width="10%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/document/d/11QIMtvBjaVLmdq3vIw1BErw702DswCnh/edit?rtpof=true"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th>
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPenelitian['file_upload_laporan_70']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-70"
													data-id="{{ $detailPenelitian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/laporan-70') }}/{{ $detailPenelitian['file_upload_laporan_70'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit penelitian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-70"
														data-id="{{ $detailPenelitian['usulan_id'] }}"><i
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
										<td width="10%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/document/d/11QIMtvBjaVLmdq3vIw1BErw702DswCnh/edit?rtpof=true"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th>
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPenelitian['file_upload_laporan_akhir']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-akhir"
													data-id="{{ $detailPenelitian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/laporan-akhir') }}/{{ $detailPenelitian['file_upload_laporan_akhir'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit penelitian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-laporan-akhir"
														data-id="{{ $detailPenelitian['usulan_id'] }}"><i
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
										<td width="25%">
											<a class="btn btn-outline-success btn-sm" target="_blank"
													href="https://docs.google.com/spreadsheets/d/1fRYWzwzxodOB1UCq3OuzAwMb_cCNN-2u/edit#gid=1392405133"><i
														class="fas fa-file-download"></i> Download Template</a>
										</th>
										<td width="10%">
											<div class="btn-group">
												@if (isset($detailPenelitian['file_upload_kepuasan_mitra']))
												<a href="#" class="btn btn-outline-danger btn-sm upload-kepuasan-mitra"
													data-id="{{ $detailPenelitian['usulan_id'] }}"><i
														class="fas fa-file-upload"></i>
													Reupload</a>
												<a class="btn btn-outline-primary btn-sm" target="_blank"
													href="{{ asset('media/kepuasan-mitra') }}/{{ $detailPenelitian['file_upload_kepuasan_mitra'] }}"><i
														class="fas fa-file-download"></i> Download</a>
												@else
													@if (in_array('edit penelitian',$user['permission_array']))
													<a href="#" class="btn btn-outline-danger btn-sm upload-kepuasan-mitra"
														data-id="{{ $detailPenelitian['usulan_id'] }}"><i
															class="fas fa-file-upload"></i>
														Upload</a>
													@endif
												@endif
											</div>
										</th>
									</tr>
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
							<a href={{ route('penelitian.data-penelitian') }} type="button"
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
					@if (in_array('create penelitian',$user['permission_array']))
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Catatan Harian</h5>
					@endif
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
							<input type="hidden" class="id-penelitian" name="id_penelitian">
							<input type="hidden" id="id-catatan-penelitian" name="id_catatan_penelitian">
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
						<input type="hidden" class="id-penelitian" name="id_penelitian">
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
	$(document).ready(function () {
		let catatanPenelitianID;
		let kucingkuId = $('#kucingku-id').val();
		/**
		* Loloskan Usulan Function
		*
		*/
		$(document).on('click', '#button-loloskan-usulan', function() {
			catatanPenelitianID = $(this).attr('data-id');
			$('#confirmLolosUsulanModal').modal('show');
		});

		$('#lolos-usulan-button').click(function() {
			$.ajax({
				url: "/penelitian/update-status-penelitian/" + catatanPenelitianID,
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
			$('.id-penelitian').val("{{ $detailPenelitian['usulan_id'] ?? '' }}");
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
				action_url = "{{ route('penelitian.tambah-catatan-harian') }}";
			}

			if ($('#action').val() == 'Edit') {
				action_url = "{{ route('penelitian.edit-catatan-harian') }}";
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
			catatanPenelitianID = $(this).attr('id');
			$('#confirmModal').modal('show');
		});

		$('#ok-delete-button').click(function() {
			$.ajax({
				url: "/penelitian/hapus-catatan-harian/" + catatanPenelitianID,
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
				url: "{{ route('penelitian.get-catatan-harian', $detailPenelitian['usulan_id']) }}",
			},
			columns: [
				{
					data: 'catatan_id',
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

		$('.id-penelitian').val(id);
		if (classList.includes('upload-proposal')){
			isUploadProposal = true;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = false;
			kepuasanMitra = false;
			url = "/penelitian/upload-proposal";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Proposal');
		}
		if (classList.includes('upload-pengesahan')){
			isUploadProposal = false;
			isUploadPengesahan = true;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = false;
			kepuasanMitra = false;
			url = "/penelitian/upload-pengesahan";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Pengesahan');
		}
		if (classList.includes('upload-laporan-akhir')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = true;
			isUploadLaporan70 = false;
			kepuasanMitra = false;
			url = "/penelitian/upload-laporan-akhir";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Laporan Akhir');
		}
		if (classList.includes('upload-laporan-70')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = true;
			kepuasanMitra = false;
			url = "/penelitian/upload-laporan-70";
			$('#upload-file').attr('action', url);
			$('#modal-upload-title').html('Upload Laporan Kemujuan 70%');
		}
		if (classList.includes('upload-kepuasan-mitra')){
			isUploadProposal = false;
			isUploadPengesahan = false;
			isUploadLaporanAkhir = false;
			isUploadLaporan70 = true;
			kepuasanMitra = false;
			url = "/penelitian/upload-kepuasan-mitra";
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