@extends('sidebar.sidebarpengguna')
@section('layout')

<div class="pagetitle">
      <h1><i class="bi bi-person"></i> Profil</h1>
      <nav>
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li> -->
          <li class="breadcrumb-item active">Profil Pengguna</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
              <h1><i class="bi bi-person-circle"></i></h1>
              <h2>{{ \App\Models\User::where('username', session('username'))->first()->nama }}</h2>
              <h3>{{ $nama_instansi }}</h3>
              <!-- <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div> -->
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profil Pengguna</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ubah Profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ubah Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Profil Pengguna</h5>

                  @foreach($pengguna as $peg)

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Username</div>
                    <div class="col-lg-9 col-md-8">{{ $peg->username }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8">{{ $peg->nama }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIP</div>
                    <div class="col-lg-9 col-md-8">{{ $peg->nip }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jabatan</div>
                    <div class="col-lg-9 col-md-8">{{ $peg->jabatan }}</div>
                  </div>
                  @endforeach

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                	@foreach($pengguna as $ppp)
                  <!-- Profile Edit Form -->
                  <form method="post" action="{{ route('pengguna.updatepengguna', ['ppp' => $ppp]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')

                    <div class="row mb-3">
                      <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="nama" value="{{ $ppp->nama }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="nip" class="col-md-4 col-lg-3 col-form-label">NIP</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nip" type="text" class="form-control" id="nip" value="{{ $ppp->nip }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="jenkel" class="col-md-4 col-lg-3 col-form-label">Jabatan</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" name="jabatan" class="form-control" value="{{ $ppp->jabatan }}">
                      </div>
                    </div>                    

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                  @endforeach

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->

                  @foreach($pengguna as $ppp)
                  <form method="post" action="{{ route('pengguna.updatepasspengguna', ['ppp' => $ppp]) }}" enctype="multipart/form-data">
                  @csrf
                  @method('PATCH')
                  <input type="hidden" name="id" value="{{ $ppp->id }}">

                    <div class="row mb-3">
                      <label for="current_password" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="current_password" type="password" class="form-control" id="current_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new_password" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password" type="password" class="form-control" id="new_password">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="new_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password Baru</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->
                  @endforeach

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

@endsection