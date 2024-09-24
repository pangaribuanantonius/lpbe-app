@extends('sidebar.sidebarsmartcitypengguna')
@section('smartcitypengguna')

<!-- Page Title -->
<div class="pagetitle">
	<h1><i class="bi bi-graph-up-arrow"></i> Smart City</h1>
	<nav>
		<ol class="breadcrumb">
			<li class="active ms-1">Kuesioner Smart City</li>
		</ol>
	</nav>
</div>
<!-- End Page Title -->

@php
$i = 0;
$i++;
@endphp

<div class="card">
	<div class="card-body">
		<form action="" method="post" enctype="multipart/form-data">
			@foreach($pertanyaan as $questions)
			<div class="form-group mt-3">
				<label>{{ $i++ }}. {{ $questions->pertanyaan }}</label>
				<input type="hidden" name="pertanyaan_id" value="{{ $questions->id }}"> <br>
				<input type="radio" name="jawaban" value="{{ $questions->pilihan1 }}"> {{ $questions->pilihan1 }} <br>
				<input type="radio" name="jawaban" value="{{ $questions->pilihan2 }}"> {{ $questions->pilihan2 }} <br>
				<input type="radio" name="jawaban" value="{{ $questions->pilihan3 }}"> {{ $questions->pilihan3 }} <br>
				<input type="radio" name="jawaban" value="{{ $questions->pilihan4 }}"> {{ $questions->pilihan4 }} <br>
			</div>
			<div class="form-group mt-3">
				<input type="file" name="">
			</div>
			@endforeach
			<button type="submit" class="btn btn-success mt-3">Simpan</button>
		</form>
	</div>
</div>

@endsection