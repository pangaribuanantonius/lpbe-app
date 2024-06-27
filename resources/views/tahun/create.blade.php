@extends('sidebar.sidebaradmin')
@section('layout')

<!-- page title -->
<div class="pagetitle">
	<h1><i class="bi bi-steam"></i> Tahun</h1>
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
			<form method="post" action="{{ route('tahun.store') }}" enctype="multipart/form-data">
				@csrf
                @method('POST')
				<div class="form-group">
					<label>Tahun</label>
					<div>
						<input type="number" name="tahun" class="form-control" value="{{ old('tahun') }}">
					</div>
				</div><br>
				<div class="form-group">
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
</section>

@endsection