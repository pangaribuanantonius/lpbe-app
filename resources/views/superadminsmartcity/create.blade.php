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
		<form action="" method="post" enctype="multipart/form-data">
            <div class="form-group mt-3">
                <label>Tulis Pertanyaan disini</label>
                <textarea name="pertanyaan" class="form-control" required></textarea>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan I disini</label>
                <input type="text" name="pilihan1" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan II disini</label>
                <input type="text" name="pilihan2" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan III disini</label>
                <input type="text" name="pilihan3" class="form-control" required>
            </div>
            <div class="form-group mt-3"></div>
                <label>Isi Pilihan IV disini</label>
                <input type="text" name="pilihan4" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Isi Pilihan V disini</label>
                <input type="text" name="pilihan5" class="form-control" required>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja I</label>
                <select name="instansi_id_1">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja II</label>
                <select name="instansi_id_2">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja III</label>
                <select name="instansi_id_3">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja IV</label>
                <select name="instansi_id_4">
                    <option value="">Pilih</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <label>Pilih Unit Kerja V</label>
                <select name="instansi_id_5">
                    <option value="">Pilih</option>
                </select>
            </div>
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
	</div>
</div>

@endsection