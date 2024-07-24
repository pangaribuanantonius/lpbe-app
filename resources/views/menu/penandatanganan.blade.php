@extends('sidebar.sidebarpenandatangananpengguna')
@section('penandatanganan')


<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-pen"></i> Penandatanganan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Data Penandatanganan</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->


<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			@if($jumlahtandatangan == 0)
			<div class="card">
				<div class="mx-auto mt-3 mb-3 text-secondary">Tidak Ada Data</div>
			</div>
			<a href="{{ route('penandatanganan.create') }}"> 
				<button class="btn btn-outline-primary" type="button">
					<i class="bi bi-plus-circle"></i> Tambah Data
				</button>
			</a>
			@else
			<div class="card">
				<div class="card-body">
					@foreach($penandatanganan as $pn)
					<div class="row mt-2">
						<div class="col-lg-6">
							<p>
								<div class="mt-3">
									<label><h5>Nama Instansi</h5></label>
									<div>
										{{ $pn->instansi->nama_instansi }}
									</div>
								</div>
								<div class="mt-3">
									<label><h5>NIP</h5></label>
									<div>
										 {{ $pn->nip }}
									</div>
								</div>
								<div class="mt-3">
									<label><h5>Kepala Dinas</h5></label>
									<div>
										{{ $pn->nama }}
									</div>
								</div>
							</p>
						</div>
						<div class="col-lg-6">
							<p>
								<div class="mt-3">
									<label><h5>Jabatan</h5></label>
									<div>
										{{ $pn->jabatan }}
									</div>
								</div>
								<div class="mt-3">
									<label><h5>Pangkat</h5></label>
									<div>
										{{ $pn->pangkat }}
									</div>
								</div>
								<div class="mt-3">
									<label><h5>Tempat</h5></label>
									<div>
										{{ $pn->kecamatan->nama_kecamatan }}
									</div>
								</div>
							</p>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<a href="{{ route('penandatanganan.edit', $pn->id) }}"> 
				<button class="btn btn-outline-primary" type="button">
					<i class="bi bi-pencil-square"></i> Ubah Data
				</button>
			</a>
			@endif
		</div>
	</div>
</section>


@endsection