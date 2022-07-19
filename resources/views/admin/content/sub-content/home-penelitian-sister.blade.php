<div class="card">
  <div class="card-header">
    <h5 class="card-header-text"></h5>
  </div>
  <div class="card-block">
    <div class="view-info">
      <div class="row">
        <div class="col-lg-12">
          <div class="general-info">
            <div class="row">
              <div class="col-sm-12 table-responsive">
                <table class="table table-hover riwayat-penelitian">
                  <tbody>
                    <tr>
                      <td style="
                          width: 30px;
                          text-align: center;
                          padding: 0;
                      "></td>
                      <td style="padding: 0"></td>
                    </tr>
                    @if (Session::has('kucingku'))
                      @if (isset(Session::get('kucingku')['sister_data']) && isset(Session::get('kucingku')['sister_data']['penelitian']))
                        @php
                          $dataPenelitian = Session::get('kucingku')['sister_data']['penelitian'] ?? [];
                        @endphp
                        @if (count($dataPenelitian) < 1)
                          <div class="alert alert-warning" role="alert">
                            Data tidak ditemukan
                          </div>
                        @else
                          @for ($i = 0; $i < count($dataPenelitian); $i++)
                          <tr>
                            <td>{{ $i+1 }}</td>
                            <td>
                              <h6>{{ $dataPenelitian[$i]['judul'] ?? '' }}</h6>
                              <b>Tahun: </b>{{ $dataPenelitian[$i]['tahun_pelaksanaan'] ?? '' }} |
                              <b>Peran: </b>{{ $dataPenelitian[$i]['peran'] ?? '' }} |
                              <b>Sumber Dana: </b>{{ $dataPenelitian[$i]['sumber_dana']['sumber_dana_nama'] ?? '' }}<br />
                              {{-- <span class="text-primary"><b>Penelitian Dosen
                                  Pemula</b></span> --}}
                            </td>
                          </tr>
                          @endfor
                        
                        @endif
                      @endif
                    @endif

                  </tbody>
                </table>
              </div>
            </div>
            <!-- end of row -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>