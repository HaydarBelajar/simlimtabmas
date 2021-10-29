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
                    
                    @for ($i = 0; $i < count($dataPenelitian); $i++)
                    <tr>
                      <td>{{ $i+1 }}</td>
                      <td>
                        <h6>{{ $dataPenelitian[$i]['judul'] ?? '' }}</h6>
                        <b>Tahun: </b>{{ $dataPenelitian[$i]['tahun']['tahun_usulan'] ?? '' }} |
                        <b>Peran: </b>{{ $dataPenelitian[$i]['peran'] ?? '' }} |
                        <b>Sumber Dana: </b>{{ $dataPenelitian[$i]['sumber_dana']['sumber_dana_nama'] ?? '' }}<br />
                        {{-- <span class="text-primary"><b>Penelitian Dosen
                            Pemula</b></span> --}}
                      </td>
                    </tr>
                    @endfor

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