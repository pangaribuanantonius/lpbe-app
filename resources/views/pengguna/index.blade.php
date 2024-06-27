@extends('sidebar.sidebarunitkerjaadmin')
@section('unitkerja')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-people"></i> Pengguna</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Data Pengguna</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<section class="dashboard">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-body mt-3">
					<table class="table table-hover datatable">
						<thead>
		                    <tr>
		                        <th>Nama</th>
		                        <th>Aksi</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    @foreach($user as $akun)
		                    <tr>
		                        <td>{{ $akun->nama }}</td>
		                        <td>
		                            <div class="text-center">
		                                <a href="{{ route('pengguna.editdata', $akun->id) }}"><i class="bi bi-pencil"></i></a>
		                            </div>
		                            <!-- <div class="text-center">
		                                <a href="#" data-bs-toggle="modal" data-bs-target="#Modal"><i class="fas fa-paper-plane text-success"></i></a>
		                            </div> -->
		                        </td>   
		                    </tr>                       
		                    @endforeach
		                </tbody>
					</table>
					<a class="btn btn-outline-success" href="{{ route('pengguna.addpengguna', ['instansi_id' => $instansi_id]) }}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection