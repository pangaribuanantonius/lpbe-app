@extends('sidebar.sidebaradmin')
@section('layout')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-people"></i> Pengguna</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Form Pengguna</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('pengguna.simpanpengguna') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" value="{{ $instansi_id }}">
						<div class="form-group mt-3">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>NIP</label>
							<input type="number" name="nip" class="form-control" value="{{ old('nip') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>Jabatan</label>
							<input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}">
						</div>
						<div class="form-group mt-3">
							<label>Username</label>
							<input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>Password</label>
							<input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
						</div>
						<div class="form-group mt-3">
							<button class="btn btn-outline-success btn-icon-split" type="submit">
								<span class="icon">
									<i class="bi bi-check-circle"></i>
								</span>
								<span class="text">Simpan</span>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection