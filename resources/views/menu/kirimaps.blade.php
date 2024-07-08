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
                    <form action="{{ route('menu.uploadberkasaps') }}" method="get" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-12">
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
                       
                          <div class="d-grid d-flex gap-2">
                            <button class="btn btn-outline-dark" type="submit"><i class="bi bi-arrow-right-circle"></i> Lanjut</button>
                            <a href="{{ route('menu.berkas') }}" class="btn btn-outline-primary"><i class="bi bi-files"></i> Data</a>
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











