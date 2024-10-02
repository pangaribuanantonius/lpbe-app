@extends('sidebar.sidebaradmin')
@section('layout')

<link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.bootstrap5.css">

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-graph-up-arrow"></i> Smart City</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Daftar Pertanyaan</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Pertanyaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listpertanyaan as $pertanyaan)
        <tr>
            <td>{{ $pertanyaan->pertanyaan }}</td>
            <td>
                <a class="btn btn-outline-primary" href="{{ route('superadminsmartcity.edit_pertanyaan', $pertanyaan->id) }}"><i class="bi bi-eye"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/dataTables.bootstrap5.js"></script>

  <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
  </script>




@endsection