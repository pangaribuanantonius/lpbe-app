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
                    <form action="{{ route('menu.updatelayananaplikasi') }}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('POST')
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
                            <a class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#Modal"><i class="bi bi-arrow-right-circle"></i> Lanjut</a>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Kirim Data</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  Apakah anda ingin mengirimkan data ?
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Batal</button>
                                    <button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split"><i class="bi bi-cloud-upload"></i> <span class="text">Lanjutkan</span></button>
                                </div>
                              </div>
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











