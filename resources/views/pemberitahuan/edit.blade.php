@extends('sidebar.sidebarpemberitahuanadmin')
@section('pemberitahuanadmin')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-app-indicator"></i> Pemberitahuan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Form Data</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="dashboard">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<form method="post" action="{{ route('pemberitahuan.edit', ['pemberitahuan' => $pemberitahuan]) }}" enctype="multipart/form-data">
							@csrf
							@method('PATCH')
							<div class="form-group mt-3">
								<label>Isi Pemberitahuan</label>
								<div>
									<textarea name="isi_pemberitahuan" class="form-control" required>{{ $pemberitahuan->isi_pemberitahuan }}</textarea>
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
	</div>
</section>


@endsection