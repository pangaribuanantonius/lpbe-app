@extends('sidebar.sidebarurusanaplikasiadmin')
@section('urusanapikasi')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-bar-chart-steps"></i> Bidang Urusan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Data</li>
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
						<table class="table table-hover datatable">
							<thead>
								<tr>
									<th scope="col" class="align-middle">Nama Bidang Urusan</th>
									<th scope="col" class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								 @foreach($bidangurusan1 as $bidangurusanapspem)
								<tr>
									<!-- <td>{{ $bidangurusanapspem->urusanapladmpemerintah->id }}</td> -->
									<td>{{ $bidangurusanapspem->nama_bidang_urusan }}</td>
									<td class="text-center">
			                            <a class="btn btn-outline-primary" style="white-space: nowrap;" href="{{ route('bidangurusanaplikasiadmpemerintah.edit', $bidangurusanapspem->id) }}"><i class="bi bi-pencil"></i> Edit</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<a class="btn btn-outline-success" href="{{ route('bidangurusanaplikasiadmpemerintah.create', ['urusan_id' => $urusan_id]) }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection