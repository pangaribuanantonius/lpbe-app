@extends('sidebar.sidebaradmin')
@section('layout')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-bar-chart-steps"></i> Bidang Urusan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Form Data</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="dashboard">
	<div class="row">
		<div class="col-lg-12">
                <div class="card">
					<div class="card-body">
						<form class="mt-3" method="post" action="{{ route('bidangurusanaplikasiadmpemerintah.edit', ['bidangurusan1' => $bidangurusan1]) }}" enctype="multipart/form-data">
							@csrf
		                	@method('PATCH')
		                	<input type="hidden" name="id" value="{{ $bidangurusan1->id }}">
		                	<input type="hidden" name="urusan_id" class="form-control" value="{{ $bidangurusan1->urusan_id }}">
							<div class="form-group mb-3">
								<label>Nama Bidang Urusan</label>
								<input type="text" name="nama_bidang_urusan" class="form-control" value="{{ $bidangurusan1->nama_bidang_urusan }}">
							</div>

							<div class="form-group mb-3">
								<button class="btn btn-outline-success btn-icon-split" type="submit">
									<span class="icon">
										<i class="bi bi-check-circle"></i>
									</span>
									<span class="text">Simpan</span>
								</button>

								<a href="#" class="btn btn-outline-danger btn-icon-split"  data-bs-toggle="modal" data-bs-target="#Modal">
			                        <span class="icon">
			                            <i class="bi bi-trash"></i>
			                        </span>
			                        <span class="text">Hapus</span>
			                    </a>

							</div>
						</form>
					</div>
				</div>
			</div>
	</div>
</section>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Yakin Mengirim Data Ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
				<form method="post" action="{{ route('bidangurusanaplikasiadmpemerintah.delete', $bidangurusan1->id) }}" enctype="multipart/form-data">
					@csrf
					@method('DELETE')
					<input type="hidden" name="id">
					<button type="submit" class="btn btn-sm btn-outline-primary btn-icon-split">
						<span class="text"><i class="bi bi-check-circle"></i> Hapus</span>
					</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection


