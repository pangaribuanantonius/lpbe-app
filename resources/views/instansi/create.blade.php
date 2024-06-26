@extends('sidebar.sidebarunitkerjaadmin')
@section('unitkerja')

<!-- page title -->
<div class="pagetitle">
	<h1><i class="bi bi-diagram-3"></i> Unit Kerja</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Tambah Data</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body">
					<form method="post" action="{{ route('instansi.store') }}" enctype="multipart/form-data">
						@csrf
						@method('POST')
						<div class="form-group mt-3">
							<label>Unit Kerja</label>
							<div>
								<input type="text" name="nama_instansi" class="form-control" value="{{ old('nama_instansi') }}" required>
							</div>
						</div>
						<div class="form-group mt-3">
							<label>Kecamatan <small class="fst-italic">(Sesuai dengan alamat unit kerja)</small></label>
							<div>
								<select name="kecamatan_id" class="form-control" required>
									<option value="">Pilih</option>
									@foreach($kecamatan as $listkecamatan)
									<option value="{{ $listkecamatan->id }}">{{ $listkecamatan->nama_kecamatan }}</option>
									@endforeach
								</select>
							</div>
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