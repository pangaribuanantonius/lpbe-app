@extends('sidebar.sidebaradmin')
@section('layout')

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

<div class="card">
	<div class="card-body">
		<form action="#" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group mt-3">
                <label>No Urut</label>
                <input type="number" name="no_urut" class="form-control" value="{{ $pertanyaan->no_urut }}" required>
            </div>
            <div class="form-group mt-3">
                <label>Tulis Pertanyaan disini</label>
                <textarea name="pertanyaan" class="form-control" required>{{ $pertanyaan->pertanyaan }}</textarea>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan I disini</label>
                <input type="text" name="pilihan1" class="form-control" value="{{ $pertanyaan->pilihan1 }}" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan II disini</label>
                <input type="text" name="pilihan2" class="form-control" value="{{ $pertanyaan->pilihan2 }}" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan III disini</label>
                <input type="text" name="pilihan3" class="form-control" value="{{ $pertanyaan->pilihan3 }}" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan IV disini</label>
                <input type="text" name="pilihan4" class="form-control" value="{{ $pertanyaan->pilihan4 }}" required>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja I</label>
                <select name="instansi_id_1" class="form-control">
                    @foreach($list_instansi as $instansi)
                    <option value="{{ $instansi->id }}" {{ $instansi->id == $pertanyaan->instansi_id_1 ? 'selected' : '' }}>{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja II</label>
                <select name="instansi_id_2" class="form-control">
                    @foreach($list_instansi as $instansi)
                    <option value="{{ $instansi->id }}" {{ $instansi->id == $pertanyaan->instansi_id_2 ? 'selected' : '' }}>{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja III</label>
                <select name="instansi_id_3" class="form-control">
                    <option value="">Pilih</option>
                    @foreach($list_instansi as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja IV</label>
                <select name="instansi_id_4" class="form-control">
                    <option value="">Pilih</option>
                    @foreach($list_instansi as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja V</label>
                <select name="instansi_id_5" class="form-control">
                    <option value="">Pilih</option>
                    @foreach($list_instansi as $instansi)
                    <option value="{{ $instansi->id }}">{{ $instansi->nama_instansi }}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success mt-3" type="submit">Submit</button>
        </form>
	</div>
</div>

@endsection


