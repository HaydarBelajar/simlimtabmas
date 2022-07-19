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
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="card card-primary card-outline">
      <div class="card-body">
        {{-- <h4>Custom Content Below</h4> --}}
        <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="identitas-tab" data-toggle="pill" href="#identitas" role="tab"
              aria-controls="identitas" aria-selected="true">Identitas</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" id="sinta-tab" data-toggle="pill" href="#sinta" role="tab" aria-controls="sinta"
              aria-selected="false">Sinta</a>
          </li> --}}
          <li class="nav-item">
            <a class="nav-link" id="penelitian-sister-tab" data-toggle="pill" href="#penelitian-sister" role="tab"
              aria-controls="penelitian" aria-selected="false">Riwayat Penelitian Sister</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pengabdian-sister-tab" data-toggle="pill" href="#pengabdian-sister" role="tab"
              aria-controls="pengabdian" aria-selected="false">Riwayat Pengabdian Sister</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" id="penelitian-tab" data-toggle="pill" href="#penelitian" role="tab"
              aria-controls="penelitian" aria-selected="false">Riwayat Penelitian Sister</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pengabdian-tab" data-toggle="pill" href="#pengabdian" role="tab"
              aria-controls="pengabdian" aria-selected="false">Riwayat Pengabdian Sister</a>
          </li> --}}
          {{-- <li class="nav-item">
            <a class="nav-link" id="artikel-jurnal-tab" data-toggle="pill" href="#artikel-jurnal" role="tab"
              aria-controls="artikel-jurnal" aria-selected="false">Artikel Jurnal</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="hki-tab" data-toggle="pill" href="#hki" role="tab" aria-controls="hki"
              aria-selected="false">HKI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="artikel-prosiding-tab" data-toggle="pill" href="#artikel-prosiding" role="tab"
              aria-controls="artikel-prosiding" aria-selected="false">Artikel Prosiding</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="buku-tab" data-toggle="pill" href="#buku" role="tab" aria-controls="buku"
              aria-selected="false">Buku</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="karya-monumental-tab" data-toggle="pill" href="#karya-monumental" role="tab"
              aria-controls="karya-monumental" aria-selected="false">Karya Monumental</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="naskah-akademik-tab" data-toggle="pill" href="#naskah-akademik" role="tab"
              aria-controls="naskah-akademik" aria-selected="false">Naskah Akademik/ Urgensi</a>
          </li> --}}
        </ul>
        <div class="tab-content" id="custom-content-below-tabContent">
          <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
            @include('admin.content.sub-content.home-identitas')
          </div>
          <div class="tab-pane fade" id="sinta" role="tabpanel" aria-labelledby="sinta-tab">
            @include('admin.content.sub-content.home-sinta')
          </div>
          <div class="tab-pane fade" id="penelitian-sister" role="tabpanel" aria-labelledby="penelitian-sister-tab">
            @include('admin.content.sub-content.home-penelitian-sister')
          </div>
          <div class="tab-pane fade" id="pengabdian-sister" role="tabpanel" aria-labelledby="pengabdian-sister-tab">
            @include('admin.content.sub-content.home-pengabdian-sister')
          </div>
          <div class="tab-pane fade" id="artikel-jurnal" role="tabpanel" aria-labelledby="artikel-jurnal-tab">
            @include('admin.content.sub-content.home-artikel-jurnal')
          </div>
          <div class="tab-pane fade" id="hki" role="tabpanel" aria-labelledby="hki-tab">
            @include('admin.content.sub-content.home-hki')
          </div>
          <div class="tab-pane fade" id="artikel-prosiding" role="tabpanel" aria-labelledby="artikel-prosiding-tab">
            @include('admin.content.sub-content.home-artikel-prosiding')
          </div>
          <div class="tab-pane fade" id="buku" role="tabpanel" aria-labelledby="buku-tab">
            @include('admin.content.sub-content.home-buku')
          </div>
          <div class="tab-pane fade" id="karya-monumental" role="tabpanel" aria-labelledby="karya-monumental-tab">
            @include('admin.content.sub-content.home-karya-monumental')
          </div>
          <div class="tab-pane fade" id="naskah-akademik" role="tabpanel" aria-labelledby="naskah-akademik-tab">
            @include('admin.content.sub-content.home-naskah-akademik')
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
@endsection