@extends('sidebar.sidebarmovenaplikasiadmin')
@section('monevaplikasiadmin')

<!-- Page Title -->
<div class="pagetitle">
  <h1><i class="bi bi-grid"></i> Monitoring dan Evaluasi SPBE</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="active ms-1"><i class="bi bi-steam"></i> {{$nama_instansi}}</li>
    </ol>
  </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
  <div class="row">
    <!-- Left side columns -->
    <div class="col-lg-8">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Progres entri Monev Aplikasi</h5>

              <!-- Pie Chart start -->
              <div id="pieChart"></div>
              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#pieChart"), {
                    series: [{!! $aplikasi_layanan_publik!!}, {!! $aplikasi_administrasi_pemerintah!!}, {!! $call_center!!}, {!! $website!!}],
                  chart: {
                  height: 350,
                  type: 'pie',
                  toolbar: {
                    show: true
                  }
                },
                  labels: ['Layanan Publik', 'Administrasi Pemerintahan', 'Call Center', 'Website']
                      }).render();
                    });
              </script>
              <!-- Pie CHart end -->

            </div>
          </div>
        </div>

        <!-- Layanan Publik Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card sales-card">
            <div class="card-body">
              <h5 class="card-title">Aplikasi<br>Pelayanan Publik</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-shop"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $aplikasi_layanan_publik }}</h6>
                  <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">meningkat</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Layanan Publik Card -->

        <!-- Adm Pemerintahan Card -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card revenue-card">
            <div class="card-body">
              <h5 class="card-title">Layanan<br>Administrasi Pemerintahan</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-building"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $aplikasi_administrasi_pemerintah }}</h6>
                  <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">meningkat</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Adm Pemerintahan Card -->

        <!-- Call Center -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Layanan<br>Call Center</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $call_center }}</h6>
                  <!-- <span class="text-danger small pt-1 fw-bold">300%</span> <span class="text-muted small pt-2 ps-1">meningkat</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Website -->
        <div class="col-xxl-4 col-md-6">
          <div class="card info-card customers-card">
            <div class="card-body">
              <h5 class="card-title">Layanan<br>Website</h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex bg-secondary-subtle align-items-center justify-content-center">
                  <i class="bi bi-globe"></i>
                </div>
                <div class="ps-3">
                  <h6>{{ $website }}</h6>
                  <!-- <span class="text-danger small pt-1 fw-bold">300%</span> <span class="text-muted small pt-2 ps-1">meningkat</span> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Website -->


        <!-- data aplikasi layanan publik -->
        <div class="col-12">
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Aplikasi Pelayanan Publik</h5>
              <table class="table table-hover datatble">
                <thead>
                  <tr class="text-danger">
                    <th scope="col">Nama Aplikasi</th>
                    <th scope="col">Tempat Aplikasi</th>
                    <th scope="col">Pengguna</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($aplikasi_layanan_publik == 0)
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  @else
                  @foreach($aps_layanan_publik as $layanan_publik)
                  <tr>
                    <td>{{ $layanan_publik->nama_aplikasi }}</td>
                    <td>{{ $layanan_publik->tempataplikasi }}</td>
                    <td>{{ $layanan_publik->pengguna }}</td>
                    <td>{{ $layanan_publik->status }}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- data aplikasi layanan administrasi pemeritahan -->
        <div class="col-12">
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Aplikasi Pelayanan Publik</h5>
              <table class="table table-hover datatble">
                <thead>
                  <tr class="text-danger">
                    <th scope="col">Nama Aplikasi</th>
                    <th scope="col">Tempat Aplikasi</th>
                    <th scope="col">Pengguna</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($aplikasi_administrasi_pemerintah == 0)
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  @else
                  @foreach($aps_adm_pemerintah as $adm_pemerintah)
                  <tr>
                    <td>{{ $adm_pemerintah->nama_aplikasi }}</td>
                    <td>{{ $adm_pemerintah->tempataplikasi }}</td>
                    <td>{{ $adm_pemerintah->pengguna }}</td>
                    <td>{{ $adm_pemerintah->status }}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

        
        <!-- data aplikasi layanan call center -->
        <div class="col-12">
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Call Center</h5>
              <table class="table table-hover datatble">
                <thead>
                  <tr class="text-danger">
                    <th scope="col">Nama Layanan</th>
                    <th scope="col">Nomor Layanan</th>
                    <th scope="col">status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($call_center == 0)
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  @else
                  @foreach($aps_callcenter as $callcenter)
                  <tr>
                    <td>{{ $callcenter->nama_layanan }}</td>
                    <td>{{ $callcenter->nomor_layanan }}</td>
                    <td>{{ $callcenter->status }}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>


        <!-- data aplikasi layanan website -->
        <div class="col-12">
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Website</h5>
              <table class="table table-hover datatble">
                <thead>
                  <tr class="text-danger">
                    <th scope="col">Nama Website</th>
                    <th scope="col">Pengembang</th>
                    <th scope="col">Tempat</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if($website == 0)
                  <tr>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                  </tr>
                  @else
                  @foreach($aps_website as $website)
                  <tr>
                    <td>{{ $website->nama_website }}</td>
                    <td>{{ $website->pengembang }}</td>
                    <td>{{ $website->tempat }}</td>
                    <td>{{ $website->status }}</td>
                  </tr>
                  @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>

       
         


       
      </div>
    </div>
    <!-- Kolom kiri end -->

    <!-- Kolom kanan start -->
    <div class="col-lg-4">
      <!-- Aktivitas terbaru start -->
      <div class="card d-none">
        <div class="card-body">
          <h5 class="card-title">Aktivitas Terbaru</h5>
          <!-- aktivitas detil start-->
          <div class="activity">
            <div class="activity-item d-flex">
              <div class="activite-label">03-05-2024</div>
              <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
              <div class="activity-content">Dinas Sosial<a href="#" class="fw-bold text-success"> berhasil
                  finalisasi</a> monev aplikasi</div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">01-05-2024</div>
              <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
              <div class="activity-content">Dinas Kependudukan dan Pencatatan Sipil<a href="#"
                  class="fw-bold text-primary"> sedang proses</a> monev aplikasi</div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">30-04-2024</div>
              <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
              <div class="activity-content">Dinas Perpustakaan dan Arsip<a href="#" class="fw-bold text-success">
                  berhasil finalisasi</a> monev aplikasi</div>
            </div>

            <div class="activity-item d-flex">
              <div class="activite-label">30-04-2024</div>
              <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
              <div class="activity-content">Dinas Sosial<a href="#" class="fw-bold text-success"> berhasil
                  finalisasi</a> monev aplikasi</div>
            </div>
            <!-- aktivitas detil end-->
          </div>
        </div>
      </div>
      <!-- Aktivitas terbaru end -->

      <!-- Pengumuman start -->
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
      <!-- Pengumuman end -->

    </div>
    <!-- Kolom kanan end -->
  </div>
</section>

@endsection