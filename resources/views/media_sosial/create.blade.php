@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-controller"></i> Media Sosial</h1>
    <ol class="breadcrumb">
        <li class="active ms-1">Form Media Sosial</li>
    </ol>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('media_sosial.store') }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="instansi_id" value="{{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" class="form-control" readonly>

                        <div class="form-group mt-3">
                            <label>Link Profil Facebook</label>
                            <input type="url" name="link_facebook" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label>Link Profil Instagram</label>
                            <input type="url" name="link_instagram" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label>Link Profil Twitter</label>
                            <input type="url" name="link_twitter" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label>Link Profil Youtube</label>
                            <input type="url" name="link_youtube" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label>Link Profil Tiktok</label>
                            <input type="url" name="link_tiktok" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label>Link Profil Threads</label>
                            <input type="url" name="link_threads" class="form-control">
                        </div>
                        <button class="btn btn-outline-success btn-icon-split mt-3" id="submitButton" type="submit">
	                    	<span class="icon">
	                    		<i class="bi bi-check2-circle"></i>
	                    	</span>
	                    	<span class="text">Simpan</span>
	                    </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection