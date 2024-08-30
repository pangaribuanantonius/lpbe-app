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
                  <a class="dropdown-item d-flex align-items-center" href="{{ route('pengguna.admin') }}">
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
        <!-- Aplikasi nav start -->
        </li>
        <li class="nav-item">
        <a class="nav-link rounded-5" href="{{ route('superadmin.menu') }}">
            <i class="bi bi-grid"></i>
            <span>Dasbor</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link rounded-5" href="{{ route('superadmin.monevaplikasi_admin', ['tahun' => '2021']) }}">
            <i class="bi bi-graph-up-arrow me-2"></i>
            <span>Monev Aplikasi</span>
        </a>
        </li>
        <!-- Aplikasi nav end -->

        <li class="nav-heading"><hr></li>
        <!-- Kembali start -->
        <li class="nav-item">
          <a class="nav-link collapsed rounded-5" href="#" onclick='javascript:history.back(-1)'>
            <i class="bi bi-arrow-left-circle"></i>
            <span>Kembali</span>
          </a>
        </li>
        <!-- Kembali end -->
    </aside>
    <!-- End Sidebar-->

    <main id="main" class="main">
      @yield('monevaplikasiadmin')
    </main>

    <footer id="footer" class="footer">
      <div class="copyright">
        &copy; Hak Cipta <strong><span>Diskominfostan Kab. Deli Serdang</span></strong>
      </div>
      <div class="credits">
        Desain oleh <a href="https://jonkolong.github.io/" target="_blank">Jon Kolong</a>
      </div>
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