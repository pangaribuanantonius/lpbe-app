@extends('sidebar.sidebarurusanaplikasiadmin')
@section('urusanapikasi')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-bar-chart-steps"></i> Urusan</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Data</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body mt-4">
					<table class="table table-hover datatable">
                      <thead>
                        <tr class="text-danger">
                          <th scope="col" class="align-middle">Nama Urusan</th>
                          <th scope="col" class="align-middle">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($urusanaplikasiadmpemerintah as $urusanapspem)
                        <tr>
                        	<td>{{ $urusanapspem->nama_urusan }}</td>
                        	<td class="text-center">
                        		<a class="btn btn-outline-dark mb-1" style="white-space: nowrap;" href="{{ route('urusanaplikasiadmpemerintah.edit', $urusanapspem->id) }}"><i class="bi bi-pencil"></i> Edit</a>
                        		<a class="btn btn-outline-primary mb-1" style="white-space: nowrap;" href="{{ route('superadmin.daftarbidangurusanaplikasiadmpemerintah', ['urusan_id' => $urusanapspem->id]) }}"><i class="bi bi-eye"></i> Lihat</a>
                        	</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
					<a class="btn btn-outline-success" href="{{ route('urusanaplikasiadmpemerintah.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection