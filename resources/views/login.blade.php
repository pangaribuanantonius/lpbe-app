
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="bootstrap.min.css" />
    <!-- Icons -->
    <link href="https://portal.deliserdangkab.go.id/wp-content/berkas/1718002763.png" rel="icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Edu+NSW+ACT+Foundation:wght@400;500;600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;1,100;1,200;1,300;1,400&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;1,100;1,300;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link href="{{ url('/') }}/asset/login/login.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.google.com/share?selection.family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900" />
    <!-- Css -->
  </head>

  <body>
    <!-- Main Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100 kotakUtama">
      <!-- Login Container -->
      <div class="row border rounded-5 p-3 bg-white shadow boxArea">
        <!-- Left Box -->
        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column leftBox">
          <div class="featured-image mb-3">
            <img src="https://portal.deliserdangkab.go.id/wp-content/berkas/1686018101.png" class="img-fluid gambarLogin d-none d-md-block" alt="gambarLogin" />
          </div>
          <small
            ><p class="text-center text-white fs-5 leftText"><i class="bi bi-cpu"></i> Monev <span class="strong">SPBE</span></p></small
          >
          <small class="text-center text-white text-wrap mb-3">Diskominfostan<br />Kabupaten Deli Serdang</small>
        </div>

        <!-- Right Box -->
        <div class="col-md-6 rightBox">
          <div class="row align-items-center">
            <div class="header-text mb-4">
              <p class="text-center mt-4">
                Selamat datang!<br>silahkan Login</p>
            </div>
            <form action="{{ route('ceklogin') }}" method="post">
              @if(session()->has('wrong'))
              <div class="alert alert-danger" role="alert">
                {{ session('wrong') }}
              </div>
              @endif
              @csrf
              <div class="input-group mb-3">
                <input type="text" name="username" id="" class="form-control form-control-lg bg-light fs-6" placeholder="Ketikkan username" />
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" id="password" class="form-control form-control-lg bg-light fs-6" placeholder="Kata Sandi" />
              </div>
              <div class="input-group mb-3 d-flex justify-content-between">
                <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" name="rememberme" id="rememberme" role="switch">
                  <label class="form-check-label" for="checkbox"><small>Ingat saya</small></label>
                </div>
                <div class="forgot">
                  <small><a id="show" href="#">Lupa kata sandi?</a></small>
                </div>
                <script>
                  document.getElementById('show').addEventListener('click', function() {
                    Swal.fire({
                      title: 'Pemberitahuan!',
                      text: 'Silahkan hubungi Bidang LPBE Dinas Komunikasi, Informatika, Statistik dan Persandian untuk mendaftarkan akun atau lupa password!',
                      icon: 'warning', // Anda bisa mengubah ikon sesuai kebutuhan
                      confirmButtonText: 'OK'
                    });
                  });
                </script>
              </div>
              <div class="input-group mb-3">
                <button class="login-btn w-100 fs-6" id="submit" name="simpan"><i class="bi bi-box-arrow-in-right me-2"></i>Login</button>
              </div>
            </form>
            <div class="row">
              <small class="text-center">Tidak punya akun? <a class="text-danger" href="#" id="show2" onclick="show()">Daftar</a></small>
                <script>
                  document.getElementById('show2').addEventListener('click', function() {
                    Swal.fire({
                      title: 'Pemberitahuan!',
                      text: 'Silahkan hubungi Bidang LPBE Dinas Komunikasi, Informatika, Statistik dan Persandian untuk mendaftarkan akun atau lupa password!',
                      icon: 'warning', // Anda bisa mengubah ikon sesuai kebutuhan
                      confirmButtonText: 'OK'
                    });
                  });
                </script>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
