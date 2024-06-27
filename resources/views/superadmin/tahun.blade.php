@extends('sidebar.sidebaradmin')
@section('layout')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-steam"></i> Tahun</h1>
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
									<th scope="col" class="align-middle">Tahun</th>
									<th scope="col" class="align-middle">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@foreach($tahun as $thn)
								<tr>
									<td>{{ $thn->tahun }}</td>
									<td>
			                            <a href="{{ route('tahun.edit', $thn->id) }}"><i class="bi bi-pencil"></i></a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						<a class="btn btn-outline-success" href="{{ route('tahun.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection