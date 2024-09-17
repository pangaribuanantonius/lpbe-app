@extends('sidebar.sidebaradmin')
@section('layout')

<!-- Page Title -->
<div class="pagetitle">
  <h1><i class="bi bi-grid"></i> Dasbor</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="active ms-1"><i class="bi bi-steam"></i> Layanan Pemerintah Berbasis Elektronik</li>
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


        <!-- Table progres unit kerja start -->
        <div class="col-12">
          <div class="card overflow-auto">
            <div class="card-body">
              <h5 class="card-title">Progres Entri Data <span>| {{ $year }}</span></h5>

              <table class="table table-hover datatable">
                <thead>
                  <tr class="text-danger">

                    <th scope="col" class="align-middle">Unit Kerja</th>
                    <th scope="col" class="text-wrap text-center align-middle">Aplikasi Pelayanan Publik</th>
                    <th scope="col" class="text-wrap text-center align-middle">Administrasi Pemerintahan</th>
                    <th scope="col" class="text-wrap text-center align-middle">Call Center</th>
                    <th scope="col" class="text-wrap text-center align-middle">Website</th>
                    <th scope="col" class="text-wrap text-center align-middle">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($instansi as $i)
                  @php

                  $year =  Carbon\Carbon::now()->year; // Mengambil tahun saat ini

                  $hitung_publik = $i->aplikasi()->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun',$year)->Where('status', '!=','Kosong')->count();
                  $hitung_administrasi = $i->aplikasi()->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $year)->Where('status', '!=','Kosong')->count();
                  $hitung_call_center = $i->call_center()->Where('tahun', $year)->Where('status', '!=','Kosong')->count();
                  $hitung_website = $i->website()->Where('tahun', $year)->Where('status', '!=','Kosong')->count();

                  $status_publik = $i->aplikasi()->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $year)->count();
                  $status_administrasi = $i->aplikasi()->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $year)->count();
                  $status_call_center = $i->call_center()->Where('tahun', $year)->count();
                  $status_website = $i->website()->Where('tahun', $year)->count();

                  $status_publik_proses = $i->aplikasi()->where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', $year)->Where('status', 'Sedang Proses')->count();
                  $status_administrasi_proses = $i->aplikasi()->where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', $year)->Where('status', 'Sedang Proses')->count();
                  $status_call_center_proses = $i->call_center()->where('tahun', $year)->Where('status','Sedang Proses')->count();
                  $status_website_proses = $i->website()->where('tahun', $year)->Where('status','Sedang Proses')->count();

                  $status_publik_final = $i->aplikasi()->where('jenis_aplikasi', 'Layanan Publik')
                  ->Where('tahun', $year)
                  ->where(function($query) {
                    $query->where('status', 'Final')
                          ->orWhere('status', 'Kosong');
                    })
                  ->count();

                  $status_administrasi_final = $i->aplikasi()->where('jenis_aplikasi', 'Administrasi Pemerintah')
                  ->Where('tahun', $year)
                  ->where(function($query) {
                    $query->where('status', 'Final')
                          ->orWhere('status', 'Kosong');
                    })
                  ->count();

                  $status_call_center_final = $i->call_center()->where('tahun', $year)
                  ->where(function($query) {
                    $query->where('status', 'Final')
                          ->orWhere('status', 'Kosong');
                    })
                  ->count();

                  $status_website_final = $i->website()->where('tahun', $year)
                  ->where(function($query) {
                    $query->where('status', 'Final')
                          ->orWhere('status', 'Kosong');
                    })
                  ->count();

                  @endphp
                  <tr>
                    <td><a href="{{ route('superadmin.rekap_aps', ['instansi_id' => $i->id]) }}" class="text-wrap text-decoration-none">{{ $i->nama_instansi }}</a></td>

                    @if($hitung_publik == 0)
                    <td class="align-middle text-center">-</td>
                    @else
                    <td class="align-middle text-center">{{ $hitung_publik }}</td>
                    @endif

                    @if($hitung_administrasi == 0)
                    <td class="align-middle text-center">-</td>
                    @else
                    <td class="align-middle text-center">{{ $hitung_administrasi }}</td>
                    @endif

                    @if($hitung_call_center == 0)
                    <td class="align-middle text-center">-</td>
                    @else
                    <td class="align-middle text-center">{{ $hitung_call_center }}</td>
                    @endif

                    @if($hitung_website == 0)
                    <td class="align-middle text-center">-</td>
                    @else
                    <td class="align-middle text-center">{{ $hitung_website }}</td>
                    @endif

                    @if($hitung_publik == 0 && $hitung_administrasi == 0 && $hitung_call_center == 0 && $hitung_website == 0)
                    <td class="align-middle text-center"><a class="badge text-danger align-middle rounded-5"><i class="bi bi-x-circle-fill me-1"></i>belum</a></td>


                    @elseif($status_publik_final >=1 && $status_administrasi_final >=1 && $status_call_center_final >=1 && $status_website_final >= 1)
                    <td class="align-middle text-center"><a class="badge text-success align-middle rounded-5"><i class="bi bi-check-circle-fill me-1"></i>Final</a></td>

                    @elseif($status_publik_final >=1 && $status_administrasi_final >=1 && $status_call_center_final >=1 && $status_website_final >= 1)
                    <td class="align-middle text-center"><a class="badge text-success align-middle rounded-5"><i class="bi bi-check-circle-fill me-1"></i>Final</a></td>

                    @else
                    <td class="align-middle text-center"><a class="badge text-primary align-middle rounded-5"><i class="bi bi-check-circle-fill me-1"></i>Proses</a></td>
                    @endif

                    <!-- <td class="align-middle text-center">1</td>
                          <td class="align-middle text-center">4</td>
                          <td class="align-middle text-center">1</td> -->
                    <!-- <td class="align-middle text-center"><a class="badge text-success align-middle rounded-5"><i class="bi bi-check-circle-fill me-1"></i>selesai</a></td> -->
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- Table progres unit kerja end -->
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