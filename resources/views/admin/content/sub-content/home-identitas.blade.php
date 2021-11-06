<div class="card card-default color-palette-box">
  <div class="card-header">
    <h3 class="card-title">
      {{-- Identitas --}}
    </h3>
  </div>
  <div class="card-body">
    <!-- /.col-12 -->
    <div class="row">
      <div class="col-lg-12">
        <div class="general-info">
          <div class="row">
            <div class="col-lg-3">
              <div class="card faq-left">
                <div class="social-profile">
                  <img id="" class="img-fluid"
                    src="{{ asset('assets/images/blank_profile.png')}}" style="width:100%" />
                  <div class="profile-hvr m-t-15">
                    <a id="" href="#">
                      <i class="fa fa-pencil-square-o fa-2x" style="color:white;"></i>
                    </a>
                  </div>
                </div>
                <div>
                </div>
                <div class="card-block text-center">
                  <div>
                    NIDN/NIDK
                  </div>
                  <h4 class="f-18 f-normal m-b-10 txt-primary">
                    <span id="ContentPlaceHolder1_ctl00_identitas_lblNidn">{{ $dataMappingDosen['nidn'] ?? ' - ' }}</span>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-5">
              <table class="table table-striped">
                <tbody>
                  <tr>
                    <th scope="row" width="40%">Institusi</th>
                    <td width="60%">
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblInstitusi" style="color:Green;">Universitas
                        Aisyiyah Yogyakarta</span>
                    </td>
                  </tr>
                  {{-- <tr>
                    <th scope="row">Program Studi</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblProdi" style="color:Green;">Bidan Pendidik</span>
                    </td>
                  </tr> --}}
                  <tr>
                    <th scope="row">Jenjang Pendidikan</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblJenjangPendidikan"
                        style="color:Green;">{{ $dataMappingDosen['jenjang_pendidikan']['jenjang'] ?? ' - ' }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Jabatan Akademik</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblJabatanAkademik"
                        style="color:Green;">{{ $dataMappingDosen['jafa']['jafa'] ?? ' - ' }}</span>
                    </td>
                  </tr>
                  {{-- <tr>
                    <th scope="row">Alamat</th>
                    <td>
                      <span id="" style="color:Green;">Beji Rt 06 Rw 09
                        Sidoarum Godean Sleman Yogyakarta
                      </span>
                    </td>
                  </tr> --}}
                </tbody>
              </table>
            </div>
            <div class="col-lg-4">
              <table class="table table-striped table-responsive">
                <tbody>
                  {{-- <tr>
                    <th scope="row">Tempat/Tanggal Lahir</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblTempat" style="color:Green;">Cilacap</span>/
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblTglLahir" style="color:Green;">27-4-1983</span>
                    </td>
                  </tr> --}}
                  <tr>
                    <th scope="row">Nomor KTP</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblNoKtp"
                        style="color:Green;">{{ $dataMappingDosen['noktp'] ?? ' - ' }}</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">NIP</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblNoKtp"
                        style="color:Green;">{{ $dataMappingDosen['nip'] ?? ' - ' }}</span>
                    </td>
                  </tr>
                  {{-- <tr>
                    <th scope="row">Nomor Telepon</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblNoTelepon" style="color:Green;">-</span>
                    </td>
                  </tr> --}}
                  {{-- <tr>
                    <th scope="row">Nomor HP</th>
                    <td>
                      <span id="ContentPlaceHolder1_ctl00_identitas_lblNoHp" style="color:Green;">085643937577</span>
                    </td>

                  </tr>
                  <tr>
                    <th scope="row">Alamat Surel</th>
                    <td>
                      <span id=""
                        style="color:Green;">ennyfitriahadi@unisayogya.ac.id</span>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">Website Personal</th>
                    <td>
                      <span id="" style="color:Green;"></span>
                    </td>
                  </tr> --}}
                </tbody>
              </table>
            </div>
            <div class="modal fade" id="modalUpdateFoto" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
              aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-header">

                            <h4><i class="fa fa-user fa-lg"></i>&nbsp;&nbsp;Ubah foto
                              profile</h4>
                          </div>
                          <div class="card-body">
                            <div>
                              <iframe src="Helper/unggahFile.aspx" id="iframeUpload" width="100%" frameborder="0"
                                height="150px"></iframe>
                            </div>
                            <div class="form-control">
                              <div style="font-size: 14px; padding: 10px;">
                                Ekstensi: JPG;JPEG;PNG.
                              </div>
                              <div style="font-size: 14px; padding: 10px;">
                                Maksimal: 100 KByte.<br>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">
                          <i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Selesai
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-xl-8">
              <table class="table m-0">
                <tbody>
                  <tr>
                    <td>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>