@extends('sidebar.sidebarmovenaplikasiadmin')
@section('monevaplikasiadmin')

<div class="pagetitle">
	<h1><i class="bi bi-cpu"></i> Monev Aplikasi</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Monitoring Aplikasi</li>
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
                  <h5 class="card-title">
                    Progres entri Monev Aplikasi 
                    <span>
                      <form method="get" action="{{ route('superadmin.monevaplikasi_admin', ['tahun' => $tahun]) }}" enctype="multipart/form-data">
                        <select name="tahun" style="border: none;">
                          @foreach($tampil_tahun as $thn)
                          <option type="submit" value="{{ $thn->tahun }}" @if ($tahun == $thn->tahun) selected="selected" @endif>{{ $thn->tahun }}</option>
                          @endforeach
                      </select>
                      <button class="bg-white" style="border:none;" type="submit"><i class="bi bi-search"></i></button>
                      </form>
                    </span>
                  </h5>
    
                  <!-- Pie Chart start -->
                  <div id="pieChart"></div>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#pieChart"), {
                        series: [{!! $aplikasi_layanan_publik_tahun !!}, {!! $aplikasi_administrasi_pemerintah_tahun !!}, {!! $call_center_tahun !!}],
                        chart: {
                          height: 350,
                          type: 'pie',
                          toolbar: {
                            show: true
                          }
                        },
                        labels: ['Layanan Publik', 'Administrasi Pemerintahan', 'Call Center']
                      }).render();
                    });
                  </script>
                  <!-- Pie CHart end -->
    
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
                    <div class="activity-content">Dinas Sosial<a href="#" class="fw-bold text-success"> berhasil finalisasi</a> monev aplikasi</div>
                  </div>

                  <div class="activity-item d-flex">
                    <div class="activite-label">01-05-2024</div>
                    <i class="bi bi-circle-fill activity-badge text-primary align-self-start"></i>
                    <div class="activity-content">Dinas Kependudukan dan Pencatatan Sipil<a href="#" class="fw-bold text-primary"> sedang proses</a> monev aplikasi</div>
                  </div>
                  
                  <div class="activity-item d-flex">
                    <div class="activite-label">30-04-2024</div>
                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <div class="activity-content">Dinas Perpustakaan dan Arsip<a href="#" class="fw-bold text-success"> berhasil finalisasi</a> monev aplikasi</div>
                  </div>
                  
                  <div class="activity-item d-flex">
                    <div class="activite-label">30-04-2024</div>
                    <i class="bi bi-circle-fill activity-badge text-success align-self-start"></i>
                    <div class="activity-content">Dinas Sosial<a href="#" class="fw-bold text-success"> berhasil finalisasi</a> monev aplikasi</div>
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