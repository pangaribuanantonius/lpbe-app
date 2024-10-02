<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

  <title>Monev SPBE</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="https://portal.deliserdangkab.go.id/wp-content/berkas/1718002763.png" rel="icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ url('/')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/quill/quill.snow.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/vendor/simple-datatables/style.css" rel="stylesheet" />
    <link href="{{ url('/')}}/assets/css/style.css" rel="stylesheet" />

  </head>

  <body>
    <!-- Header start -->
    <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
        <a href="#" class="logo d-flex align-items-center">
          <!-- <img src="assets/img/logo.png" alt="" /> -->
          <span class="d-none d-lg-block"><i class="bi bi-steam"></i> Monev SPBE</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div>
      <!-- End Logo -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
        <!-- Profile Image Icon start -->
          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <!-- <img src="assets/img/profile-img.jpg" alt="Profil" class="rounded-circle" /> -->
              <i class="bi bi-person-circle rounded-circle"></i>
              <span class="d-none d-md-block dropdown-toggle ps-2">{{ \App\Models\User::where('username', session('username'))->first()->nama }}</span> </a>
            <!-- Profile Image Icon end -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('pengguna.datapengguna') }}">
                  <i class="bi bi-gear"></i>
                  <span>Pengaturan Akun</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <!-- <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Bantuan?</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider" />
              </li> -->

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Keluar</span>
                </a>
              </li>
            </ul>
            <!-- End Profile Dropdown Items -->
          </li>
          <!-- End Profile Nav -->
        </ul>
      </nav>
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->

    <!-- Sidebar start -->
    <aside id="sidebar" class="sidebar">
      <ul class="sidebar-nav" id="sidebar-nav">
        </li>
        <li class="nav-item">
          <a class="nav-link rounded-5" href="{{ route('menu.index') }}">
            <i class="bi bi-grid"></i>
            <span>Dasbor</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->

        <!-- Aplikasi nav start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="{{ route('menu.aplikasi') }}"> <i class="bi bi-cpu"></i><span>Monev Aplikasi</span></a>
        </li>

        <!-- <li class="nav-item">
          <a class="nav-link collapsed rounded-5" data-bs-target="#aplikasi" data-bs-toggle="collapse" href="#"> <i class="bi bi-cpu"></i><span>Aplikasi</span><i class="bi bi-chevron-down ms-auto"></i> </a>
          <ul id="aplikasi" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-graph-up-arrow me-2"></i><span>Monev Aplikasi</span> </a>
            </li>
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-pen me-2"></i><span>Pendataan Aplikasi</span> </a>
            </li>
          </ul>
        </li> -->

        <!-- Aplikasi nav end -->

        <!-- SPBE start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-clipboard2-pulse"></i><span>SPBE</span><i class="bi bi-chevron-down ms-auto"></i> </a>
          <ul id="forms-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-graph-up-arrow me-2"></i><span>Monev SPBE</span> </a>
            </li>
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-file-check me-2"></i><span>Penilaian Mandiri</span> </a>
            </li>
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-binoculars me-2"></i><span>Audit Internal</span> </a>
            </li>
          </ul>
        </li>
        <!-- SPBE end -->

        <!-- Smart City start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#"> <i class="bi bi-houses"></i><span>Smart City</span><i class="bi bi-chevron-down ms-auto"></i> </a>
          <ul id="tables-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-graph-up-arrow me-2"></i><span>Kuesioner Smart City</span> </a>
            </li>
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-award me-2"></i><span>Quick Win</span> </a>
            </li>
            <li>
              <a href="#" class="rounded-5"> <i class="bi bi-clipboard-check me-2"></i><span>Kuesioner</span> </a>
            </li>
          </ul>
        </li>
        <!-- Smart City end -->

        <li class="nav-heading"><hr></li>
        <!-- Urusan start -->
        <!-- <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="urusan.html">
            <i class="bi bi-bar-chart-steps"></i>
            <span>Urusan</span>
          </a>
        </li> -->
        <!-- Urusan end -->

        <!-- Unit kerja start -->
        <!-- <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="unor.html">
            <i class="bi bi-diagram-3"></i>
            <span>Unit Kerja/Organisasi</span>
          </a>
        </li> -->
        <!-- Unit kerja end -->

        <!-- Penandatanganan start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="{{ route('menu.penandatanganan') }}">
            <i class="bi bi-pen"></i>
            <span>Penandatanganan</span>
          </a>
        </li>
        <!-- Penandatanganan end -->

        <!-- Panduan start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="{{ route('menu.panduan')}}">
            <i class="bi bi-file-earmark-pdf"></i>
            <span>Buku Panduan</span>
          </a>
        </li>
        <!-- Panduan end -->

        <!-- FAQ start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="{{ route('menu.faq') }}">
            <i class="bi bi-question-circle"></i>
            <span>Sering ditanyakan</span>
          </a>
        </li>
        <!-- FAQ end -->
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      @yield('layout')
    </main>
    <!-- End #main -->

    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Hak Cipta <strong><span>Diskominfostan Kab. Deli Serdang</span></strong>
      </div>
      <!-- <div class="credits">
        Desain oleh <a href="https://jonkolong.github.io/" target="_blank">Jon Kolong</a>
      </div> -->
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-circle-fill"></i></a>

    <script src="{{ url('/')}}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/')}}/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('/')}}/assets/vendor/quill/quill.js"></script>
    <script src="{{ url('/')}}/assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="{{ url('/')}}/assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="{{ url('/')}}/assets/vendor/php-email-form/validate.js"></script>
    <script src="{{ url('/')}}/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </body>


  @if(Session()->has('success'))
    <script>
        /*toastr.success("{{ Session::get('success') }}")*/
        Swal.fire(
          'Sukses!',
          'Berhasil Menambah Data',
          'success'
          )
      </script>
      @elseif(Session()->has('update'))
      <script>
        /*toastr.success("{{ Session::get('success') }}")*/
        Swal.fire(
          'Sukses!',
          'Berhasil Mengubah Data',
          'success'
          )
      </script>
      @elseif(Session()->has('delete'))
      <script>
        /*toastr.success("{{ Session::get('success') }}")*/
        Swal.fire(
          'Sukses!',
          'Berhasil Menghapus Data',
          'success'
          )
      </script>
      @elseif(Session()->has('updatestatus'))
      <script>
        /*toastr.success("{{ Session::get('success') }}")*/
        Swal.fire(
          'Sukses!',
          'Berhasil Memperbarui Data',
          'success'
          )
      </script>
      <!-- @elseif(session()->has('perhatian'))
      <script>
          swall.fire(
            'perhatian',
            'Silahkan Hubungi Admin',
            'warning'
            )
      </script> -->
      @endif



</html>
