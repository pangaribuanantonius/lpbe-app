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
$i = 1;
@endphp

<div class="card">
	<div class="card-body">
		<form action="{{ route('smartcity.simpan_jawaban') }}" method="post" enctype="multipart/form-data">
			@csrf
			@method('POST')
			<input type="hidden" name="tahun" value="{{ $year }}" class="form-control">
			<input type="hidden" name="instansi_id" value="{{ auth()->user()->instansi_id }}" class="form-control">

			<h2 class="mt-3">Dimensi Smart Governance</h2>
			@foreach($smartgovernance as $questions)
			<input type="hidden" name="pertanyaan_id[]" value="{{ $questions->id }}">
			<div class="form-group mt-3">
				<label>{{ $i++ }}. {{ $questions->pertanyaan }}</label> <br>
				<!-- Perbaikan: Setiap jawaban punya name unik dengan ID pertanyaan -->
				 <!-- <select name="jawaban[{{ $questions->id }}]" class="form-control" required>
					<option value="">Pilih Jawaban</option>
					<option value="{{ $questions->pilihan1 }}">{{ $questions->pilihan1 }}</option>
					<option value="{{ $questions->pilihan2 }}">{{ $questions->pilihan2 }}</option>
					<option value="{{ $questions->pilihan3 }}">{{ $questions->pilihan3 }}</option>
					<option value="{{ $questions->pilihan4 }}">{{ $questions->pilihan4 }}</option>
				 </select> -->

				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan1 }}" required> {{ $questions->pilihan1 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan2 }}" required> {{ $questions->pilihan2 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan3 }}" required> {{ $questions->pilihan3 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan4 }}" required> {{ $questions->pilihan4 }} <br>
			</div>
				<input type="file" name="">
			
			@endforeach

			<h2 class="mt-3">Dimensi Smart Branding</h2>
			@foreach($smartbranding as $questions)
			<input type="hidden" name="pertanyaan_id[]" value="{{ $questions->id }}">
			<div class="form-group mt-3">
				<label>{{ $i++ }}. {{ $questions->pertanyaan }}</label> <br>
				<!-- Perbaikan: Setiap jawaban punya name unik dengan ID pertanyaan -->
				 <!-- <select name="jawaban[{{ $questions->id }}]" class="form-control" required>
					<option value="">Pilih Jawaban</option>
					<option value="{{ $questions->pilihan1 }}">{{ $questions->pilihan1 }}</option>
					<option value="{{ $questions->pilihan2 }}">{{ $questions->pilihan2 }}</option>
					<option value="{{ $questions->pilihan3 }}">{{ $questions->pilihan3 }}</option>
					<option value="{{ $questions->pilihan4 }}">{{ $questions->pilihan4 }}</option>
				 </select> -->

				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan1 }}" required> {{ $questions->pilihan1 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan2 }}" required> {{ $questions->pilihan2 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan3 }}" required> {{ $questions->pilihan3 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan4 }}" required> {{ $questions->pilihan4 }} <br>
			</div>
			<input type="file" name="">
			@endforeach


			<h2 class="mt-3">Dimensi Smart Economy</h2>
			@foreach($smarteconomy as $questions)
			<input type="hidden" name="pertanyaan_id[]" value="{{ $questions->id }}">
			<div class="form-group mt-3">
				<label>{{ $i++ }}. {{ $questions->pertanyaan }}</label> <br>
				<!-- Perbaikan: Setiap jawaban punya name unik dengan ID pertanyaan -->
				 <!-- <select name="jawaban[{{ $questions->id }}]" class="form-control" required>
					<option value="">Pilih Jawaban</option>
					<option value="{{ $questions->pilihan1 }}">{{ $questions->pilihan1 }}</option>
					<option value="{{ $questions->pilihan2 }}">{{ $questions->pilihan2 }}</option>
					<option value="{{ $questions->pilihan3 }}">{{ $questions->pilihan3 }}</option>
					<option value="{{ $questions->pilihan4 }}">{{ $questions->pilihan4 }}</option>
				 </select> -->

				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan1 }}" required> {{ $questions->pilihan1 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan2 }}" required> {{ $questions->pilihan2 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan3 }}" required> {{ $questions->pilihan3 }} <br>
				 <input type="radio" name="jawaban[{{ $questions->id }}]" value="{{ $questions->pilihan4 }}" required> {{ $questions->pilihan4 }} <br>
			</div>
			<input type="file" name="">
			@endforeach
			<div>
				<button type="submit" class="btn btn-success mt-3">Simpan</button>
			</div>
		</form>
	</div>
</div>


@endsection