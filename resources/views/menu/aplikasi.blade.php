@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')




      <div class="pagetitle">
        <h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="active ms-1">Pendataan Aplikasi</li>
          </ol>
        </nav>
      </div>
      <!-- End Page Title -->
      

      <section class="section dashboard">
        <div class="row">
          <div class="col-lg-8">
            <div class="row">
          <!-- Left side columns -->
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-body mt-4">
                    <form action="{{ route('layanan.index') }}" method="get" enctype="multipart/form-data">
                      <input type="hidden" name="layanan" value="aplikasi">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label>Jenis Aplikasi</label>
                            <div class="mb-3">
                              <select name="jenisaplikasi" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <option value="layanan_publik">Pelayanan Publik</option>
                                <option value="administrasi_pemerintah">Administrasi Pemerintah</option>
                                <option value="call_center">Layanan Call Center</option>
                                <option class="text-primary-emphasis fw-semibold" value="website">Website</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label>Tahun</label>
                            <div class="mb-3">
                              <select name="tahun" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                 @foreach($tahun as $thn)
                                 <option value="{{ $thn->tahun }}" class="form-control">{{ $thn->tahun }}</option>
                                 @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-4"><br>
                          <div class="d-grid gap-2">
                            <button class="btn btn-outline-dark" type="submit"><i class="bi bi-arrow-right-circle"></i> Lanjut</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        
          </div>
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body pb-0">
                <h5 class="card-title text-uppercase text-center">Pemberitahuan !!!</h5>
                <ul>
                  @foreach($pemberitahuan as $ppp)
                  <li class="mt-1" align="justify">{{ $ppp->isi_pemberitahuan }}</li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>

    </main>
@endsection











