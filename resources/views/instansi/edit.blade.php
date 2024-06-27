@extends('sidebar.sidebaradmin')
@section('layout')

<!-- page title -->
<div class="pagetitle">
	<h1><i class="bi bi-diagram-3"></i> Instansi</h1>
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
			<form method="post" action="{{ route('instansi.edit', ['instansi' => $instansi]) }}" enctype="multipart/form-data">
				@csrf
                @method('PATCH')
				<div class="form-group">
					<label>Nama Instansi</label>
					<div>
						<input type="text" name="nama_instansi" class="form-control" value="{{ $instansi->nama_instansi }}">
					</div>
				</div><br>
				<div class="form-group">
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
</section>

@endsection



<!-- Modal Hapus Data -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Peringatan!</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				Apakah Yakin Menghapus Data Ini ?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-outline-danger" data-bs-dismiss="modal"><i class="bi bi-x-circle"></i> Close</button>
				<form method="post" action="{{ route('instansi.delete', $instansi->id) }}" enctype="multipart/form-data">
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