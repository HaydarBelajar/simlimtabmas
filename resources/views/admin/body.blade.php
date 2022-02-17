@section('body')

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="{{ asset('assets/images/cropped-logo-unisa-crop.png') }}" alt="AdminLTELogo"
        height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          {{-- <a href="{{ route('dashboard.home') }}" class="nav-link">Home</a> --}}
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> --}}
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        {{-- <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li> --}}

        <!-- Messages Dropdown Menu -->
        {{--
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('assets/dist/img/user1-128x128.jpg') }}" alt="User Avatar"
                  class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('assets/dist/img/user8-128x128.jpg') }}" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>

            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="{{ asset('assets/dist/img/user3-128x128.jpg') }}" alt="User Avatar"
                  class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        --}}
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            @if(Session::has('kucingku'))
            <span class="badge badge-warning navbar-badge">{{ count(Session::get('kucingku')['notification'])
              }}</span>
            @endif
          </a>
          @if(Session::has('kucingku'))
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">Jumlah Notifikasi : {{
              count(Session::get('kucingku')['notification']) }} </span>
            @foreach (Session::get('kucingku')['notification'] as $item)
            <div class="dropdown-divider"></div>
            <a href=<?=$item['tipe']=='penelitian' ? "/penelitian/detail-penelitian/" .$item['id'] : "#" ?> class="
              dropdown-item">
              <i class="fas fa-envelope mr-2"></i>{{$item['tipe']}} : {{$item['judul']}}
              {{-- <span class="float-right text-muted text-sm">3 mins</span> --}}
            </a>
            {{-- <div class="dropdown-divider"></div> --}}
            {{-- <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a> --}}
            @endforeach
          </div>
          @endif
        </li>
        {{--
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>--}}
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="SIMLITABMAS Logo" class="img-fluid able-logo"> --}}
        {{-- <span class="brand-text font-weight-light"> - Unisa</span> --}}
        <img src="{{ asset('assets/images/cropped-logo-unisa-crop.png') }}" alt="SMA Negeri 1 Grobogan Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
      </a>

      <!-- Sidebar -->
      <div
        class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{ asset('assets/images/blank_profile.png') }}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            @if(Session::has('kucingku'))
            <a href="#" class="d-block"> {{ Session::get('kucingku')['user']['name'] ?? '' }} </a>
            <input type="hidden" id="kucingku-id" value="{{ Session::get('kucingku')['user']['id'] ?? '' }}">
            @endif
          </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
            <li class="nav-header" style="font-weight: bold;">Menu Utama</li>
            <li class="nav-item menu-open">
              <a href="{{route('dashboard.home')}}" class="nav-link active">
                <i class="nav-icon fa fa-home"></i>
                <p>
                  Beranda
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-edit"></i>
                <p>
                  Penelitian
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('penelitian.data-penelitian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Data Penelitian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('penelitian.reviewer')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Reviewer Penelitian</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="{{route('penelitian.data-catatan-harian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Catatan Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('penelitian.data-laporan-akhir')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Laporan Akhir</p>
                  </a>
                </li> --}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('penelitian-usulan-baru.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Usulan baru</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('penelitian-usulan-lanjutan.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Usulan lanjutan</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('perbaikan-usulan.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Perbaikan Usulan</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('sptb.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>SPTB</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('laporan-kemajuan.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Laporan Kemajuan</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('laporan-akhir.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Laporan Akhir</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Identitas PRN</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Arsip</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('rekap-luaran.index')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Rekap Luaran</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Pengabdian Masyarakat
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('penelitian.data-penelitian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Data Pengabdian</p>
                  </a>
                </li>
                {{-- <li class="nav-item">
                  <a href="{{route('penelitian.data-penelitian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Catatan Harian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('penelitian.data-penelitian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Laporan Akhir</p>
                  </a>
                </li>--}}
              </ul>
            </li>
            {{-- <li class="nav-item">--}}
              {{-- <a href="#" class="nav-link">--}}
                {{-- <i class="nav-icon fas fa fa-book"></i>--}}
                {{-- <p>--}}
                  {{-- Pelaksana Kegiatan--}}
                  {{-- <i class="right fas fa-angle-left"></i>--}}
                  {{-- </p>--}}
                {{-- </a>--}}
              {{-- <ul class="nav nav-treeview">--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Catatan Harian</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Pengembalian Dana</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Kesanggupan Pelaksanaan</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- </ul>--}}
              {{-- </li>--}}
            {{-- <li class="nav-item">--}}
              {{-- <a href="#" class="nav-link">--}}
                {{-- <i class="nav-icon fa fa-copy"></i>--}}
                {{-- <p>--}}
                  {{-- Riwayat Usulan--}}
                  {{-- </p>--}}
                {{-- </a>--}}
              {{-- </li>--}}
            {{-- <li class="nav-item">--}}
              {{-- <a href="#" class="nav-link">--}}
                {{-- <i class="nav-icon fa fa-user"></i>--}}
                {{-- <p>--}}
                  {{-- Pendaftaran Reviewer--}}
                  {{-- <i class="fas fa-angle-left right"></i>--}}
                  {{-- </p>--}}
                {{-- </a>--}}
              {{-- <ul class="nav nav-treeview">--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Penelitian (Nasional)</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>Penelitian (Internal PT)</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- <li class="nav-item">--}}
                  {{-- <a href="{{route('manage-user.list')}}" class="nav-link">--}}
                    {{-- <i class="fa fa-chevron-right nav-icon"></i>--}}
                    {{-- <p>PPM (Nasional)</p>--}}
                    {{-- </a>--}}
                  {{-- </li>--}}
                {{-- </ul>--}}
              {{-- </li>--}}
            @if (in_array('Super Admin', Session::get('kucingku')['roles']))
            <li class="nav-item">
              <a href="{{route('manage-user.list')}}" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Manajemen Pengguna
                </p>
              </a>
            </li>
            @endif
            <li class="nav-item">
              <a href="{{route('logout')}}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Log Out
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    @yield('content')
    @endsection