@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-controller"></i> Media Sosial</h1>
    <ol class="breadcrumb">
        <li class="active ms-1">Data</li>
    </ol>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="#" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <input type="text" name="instansi_id" value="{{ \App\Models\User::where('username', session('username'))->first()->instansi_id }}" class="form-control" readonly>

                        <div class="form-group">
                            <label>Link Profil Facebook</label>
                            <input type="text" name="link_facebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Instagram</label>
                            <input type="text" name="link_instagram" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Facebook</label>
                            <input type="text" name="link_facebook" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Twitter</label>
                            <input type="text" name="link_twitter" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Youtube</label>
                            <input type="text" name="link_youtube" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Tiktok</label>
                            <input type="text" name="link_tiktok" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Link Profil Threads</label>
                            <input type="text" name="link_threads" class="form-control">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection