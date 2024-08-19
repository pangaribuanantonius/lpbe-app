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
            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed bg-primary-emphasis" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Apa saja layanan dalam aplikasi SPBE ?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Didalam Aplikasi SPBE terdapat beberapa layanan maupun sub layanan, yaitu :
            <ul>
                <li>
                    Layanan Aplikasi
                    <ul>Aplikasi Pelayanan Publik</ul>
                    <ul>Aplikasi Layanan Administrasi Pemerintahan</ul>
                    <ul>Layanan Call Center</ul>
                </li>
                <li>Layanan SPBE</li>
                <li>Layanan Smart City</li>
            </ul>
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
            Bagaimana cara menambahkan data pada layanan aplikasi ?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            Untuk menambah data, silahkan pilih kategori dan tahun yang tersedia pada halaman aplikasi.<br>
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