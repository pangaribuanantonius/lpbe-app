@extends('sidebar.sidebarpenandatangananpengguna')
@section('penandatanganan')


<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-pen"></i> Penandatanganan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Form Data</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('penandatanganan.store') }}" enctype="multipart form-data">
						@csrf
						@method('POST')
						<input type="hidden" name="instansi_id" class="form-control" value="{{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" readonly>
                    	<input type="hidden" name="user_id" class="form-control" value="{{ \App\Models\User::where('username', session('username'))->first()->id }}" readonly>
						<div class="form-group mt-3">
							<label>NIP</label>
							<input type="number" name="nip" class="form-control" value="{{ old('$nip') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" value="{{ old('$nama') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>Jabatan</label>
							<input type="text" name="jabatan" class="form-control" value="{{ old('$jabatan') }}" required>
						</div>
						<div class="form-group mt-3">
							<label>Tempat</label>
							<select name="tempat" class="form-control form-select" required>
								<option value="">Pilih alamat</option>
								<option value="Lubuk Pakam">Lubuk Pakam</option>
							</select>
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