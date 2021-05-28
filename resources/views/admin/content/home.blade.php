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
              <a class="nav-link active" id="identitas-tab" data-toggle="pill" href="#identitas" role="tab" aria-controls="identitas" aria-selected="true">Identitas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="sinta-tab" data-toggle="pill" href="#sinta" role="tab" aria-controls="sinta" aria-selected="false">Sinta</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="penelitian-tab" data-toggle="pill" href="#penelitian" role="tab" aria-controls="penelitian" aria-selected="false">Penelitian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pengabdian-tab" data-toggle="pill" href="#pengabdian" role="tab" aria-controls="pengabdian" aria-selected="false">Pengabdian</a>
            </li>
          </ul>
          <div class="tab-content" id="custom-content-below-tabContent">
            <div class="tab-pane fade show active" id="identitas" role="tabpanel" aria-labelledby="identitas-tab">
               <div class="card card-default color-palette-box">
                <div class="card-header">
                  <h3 class="card-title">
                    {{-- Identitas --}}
                  </h3>
                </div>
                <div class="card-body">
                  <div class="col-12">
                    <h5>Theme Colors</h5>
                  </div>
                  <!-- /.col-12 -->
                  <div class="row">
                    <div class="col-sm-4 col-md-2">
                      <h4 class="text-center">Primary</h4>
      
                      <div class="color-palette-set">
                        <div class="bg-primary color-palette"><span>#007bff</span></div>
                        <div class="bg-primary disabled color-palette"><span>Disabled</span></div>
                      </div>
                    </div>
                  </div>
				</div>
			   </div>
            </div>
            <div class="tab-pane fade" id="sinta" role="tabpanel" aria-labelledby="sinta-tab">
               Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut ligula tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod pellentesque diam.
            </div>
            <div class="tab-pane fade" id="penelitian" role="tabpanel" aria-labelledby="penelitian-tab">
               Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna.
            </div>
            <div class="tab-pane fade" id="pengabdian" role="tabpanel" aria-labelledby="pengabdian-tab">
               Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis.
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection