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
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        {{-- <li class="nav-item dropdown">
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
            </a>
            @endforeach
          </div>
          @endif
        </li> --}}
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('dashboard.home') }}" class="brand-link">
        {{-- <img src="{{ asset('assets/images/logo.png') }}" alt="SIMLITABMAS Logo" class="img-fluid able-logo"> --}}
        {{-- <span class="brand-text font-weight-light"> - Unisa</span> --}}
        <img src="{{ asset('assets/images/cropped-logo-unisa-crop.png') }}" alt="Simlitabmas UNISA Yogyakarta"
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

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                             with font-awesome or any other icon font library -->
            {{-- <li class="nav-header" style="font-weight: bold;">Menu Utama</li>
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
                  <a href="{{route('pengabdian.data-pengabdian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Data Pengabdian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('pengabdian.reviewer')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Reviewer Pengabdian</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Sister Data
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('sister.daftar-penelitian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Data Penelitian</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('sister.daftar-pengabdian')}}" class="nav-link">
                    <i class="fa fa-chevron-right nav-icon"></i>
                    <p>Data Pengabdian</p>
                  </a>
                </li>
              </ul>
            </li>
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
            </li> --}}
            @foreach (config('menu.dashboard.sidebar') as $menuSidebar)
            @if (!isset($menuSidebar['link']) && empty($menuSidebar['link']) && in_array($menuSidebar['permission']??'', $user['permission_array']))
              <li class="nav-header">{{ $menuSidebar['title'] }}</li>
            @else
                @php
                    $submenu_class = '';
                    foreach ($menuSidebar['submenu']??[] as $getSubmenu) {
                        if (isset($getSubmenu['link']) && ( route($getSubmenu['link']) == url()->current()) ) {
                            $submenu_class = 'menu-open';
                        }
                    }
                @endphp


                <li class="nav-item {{ $submenu_class }}">
                    @php
                        $menu = false;
                    @endphp
                    @if (is_array($menuSidebar['permission']))
                    @php
                    @endphp
                        @foreach ($menuSidebar['permission'] as $permission)
                            {{-- Ignore aja, belum dipakai --}}
                            {{-- @if ($permission != 'list master data' && (in_array($permission, $user['permission_array'])))
                                @if (in_array('list master data',$menuSidebar['permission']) && in_array('list master data', $user['permission_array']))
                                         @php
                                        $menu = true;
                                        continue;
                                    @endphp
                                @endif
                            @endif --}}
                            @if ($permission != 'users management' && (in_array($permission, $user['permission_array'])))
                                @if (in_array('users management',$menuSidebar['permission']) && in_array('users management', $user['permission_array']))
                                         @php
                                        $menu = true;
                                        continue;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @else
                        @if (in_array($menuSidebar['permission']??'', $user['permission_array']))
                            @php
                                $menu = true;
                            @endphp
                        @endif
                    @endif
                    @if ($menu)
                        <a href="{{ isset($menuSidebar['link']) && !empty($menuSidebar['link']) ? route($menuSidebar['link']) : '#' }}" class="nav-link {{ url()->current() == (isset($menuSidebar['link']) && !empty($menuSidebar['link']) ? route($menuSidebar['link']) : '#' ) ? 'active' : '' }}">
                            <i class="nav-icon {{ $menuSidebar['icon']??'' }}"></i>
                            <p>{{ $menuSidebar['title'] }}
                              {{-- Belum digunakan --}}
                                @if (isset($labelCount['name']) && $labelCount['name'] == (isset( $menuSidebar['id']) ?  $menuSidebar['id'] : '') )
                                    {{-- <span class="badge badge-warning right"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Jumlah Pending">{{ $labelCount['notif'] }}</span> --}}
                                @endif
                            </p>
                            @if(isset($menuSidebar['submenu']))
                            <i class="fas fa-angle-left right"></i>
                            @endif
                        </a>
                        @if (isset( $menuSidebar['submenu']) &&  !empty($menuSidebar['submenu']))
                            <ul class="nav nav-treeview">
                                @foreach ($menuSidebar['submenu'] as $submenu)
                                @if (in_array($submenu['permission']??'', $user['permission_array']))

                                <li class="nav-item">
                                    <a href="{{ isset($submenu['link']) && !empty($submenu['link']) ? route($submenu['link']) : '#' }}" class="nav-link {{ url()->current() == (isset($submenu['link']) && !empty($submenu['link']) ? route($submenu['link']) : '#' ) ? 'active' : '' }}">
                                    <i class=" nav-icon {{ $submenu['icon'] }}"></i>
                                    <p>{{ $submenu['title'] }}</p>
                                    </a>
                                </li>
                                @endif

                                @endforeach
                            </ul>
                        @endif
                    @endif
                </li>
                
            @endif
        @endforeach
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