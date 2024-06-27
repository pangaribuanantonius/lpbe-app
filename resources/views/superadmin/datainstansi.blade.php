@extends('sidebar.sidebarunitkerjaadmin')
@section('unitkerja')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-diagram-3"></i> Unit Kerja</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Data Unit Kerja</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th scope="col" class="align-middle" width="75%">Nama Instansi</th>
									<th scope="col" class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($instansi as $datainstansi)
								<tr>
									<td>{{ $datainstansi->nama_instansi }}</td>
									<td class="text-center">
			                            <a class="btn btn-outline-danger text-center mb-1" href="{{ route('instansi.edit', $datainstansi->id) }}"><i class="bi bi-pencil" style="white-space: nowrap"></i> Edit</a>
			                            <a class="btn btn-outline-primary text-center mb-1" href="{{ route('pengguna.index', ['instansi_id' => $datainstansi->id]) }}" style="white-space: nowrap"><i class="bi bi-eye"></i> Lihat</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<a class="btn btn-outline-success" href="{{ route('instansi.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection