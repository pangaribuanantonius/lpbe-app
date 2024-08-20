@extends('sidebar.sidebarpengguna')
@section('layout')


<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-question-circle"></i> FAQ</h1>
    <nav>
      <ol class="breadcrumb">
        <!-- <li class="active ms-1"><i class="bi bi-steam"></i> Layanan Pemerintah Berbasis Elektronik</li> -->
      </ol>
    </nav>
  </div>
  <!-- End Page Title -->

<div class="accordion" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Apa itu Aplikasi SPBE ?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Aplikasi Monev SPBE (Monitoring dan Evaluasi Sistem Pemerintahan Berbasis Elektronik) adalah platform yang dirancang untuk memantau dan mengevaluasi implementasi dan kinerja Sistem Pemerintahan Berbasis Elektronik (SPBE). Tujuan dari aplikasi ini adalah untuk memastikan bahwa penerapan SPBE berjalan sesuai dengan rencana, mencapai tujuan yang diharapkan, dan mengidentifikasi area yang memerlukan perbaikan.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Apa saja fitur yang ada pada aplikasi monev spbe ?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Beberapa fitur aplikasi Monev SPBE meliputi: <br>
            1. Layanan Aplikasi. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;a. Aplikasi Pelayanan Publik. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;b. Aplikasi Administrasi Pemerintahan. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;c. Layanan Call Center. <br>
            2. Layanan SPBE (Sistem Pemerintahan Berbasis Elektronik). <br>
            3. Layanan Smart City
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Cara Mendapatkan Akun Monev SPBE ?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Akun masing-masing Unit Kerja/OPD diberikan oleh Dinas Komunikasi, Informatika, Statistik dan Persandian.<br>
            Akun user dan password dikelola oleh masing-masing Unit Kerja.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Bagaimana jika lupa user Pengguna unit kerja?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Silahkan berkoordinasi ke Bidang LPBE Dinas Komunikasi, Informatika, Statistik dan Persandian Kabupaten Deli Serdang.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Bagaimana jika lupa password user?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Untuk melakukan perubahan Password Pengguna, silahkan berkoordinasi ke Bidang LPBE Dinas Komunikasi, Informatika, Statistik dan Persandian Kabupaten Deli Serdang.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Bagaimana cara menambahkan data pada aplikasi ?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Untuk menambah data, silahkan pilih kategori dan tahun yang tersedia pada aplikasi.<br>
            Isi data sesuai dengan benar dan tepat.<br>
            Lakukan Finalisasi Layanan jika sudah yakin.<br>
            Lampirkan laporan layanan yang sudah disetujui Administrator pada menu unggah berkas.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Apakah bisa Finalisasi layanan jika salah satu layanan tidak ada data yang ingin ditambah ?
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Bisa. Silahkan lakukan Finalisasi layanan jika data tidak ada
          </div>
        </div>
      </div>
</div>

@endsection