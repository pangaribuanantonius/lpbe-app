@extends('sidebar.sidebarmonevaplikasipengguna')
@section('monevaplikasipengguna')

<!-- Page Title -->
<div class="pagetitle">
    <h1><i class="bi bi-files"></i> Berkas</h1>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body mt-3">

                    <table class="table table-hover datatable">
                        <thead>
                            <tr>
                                <th>Nama Berkas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($berkas->posisi == 'Pengguna')
                            <tr>
                                <td>Layanan Aplikasi Publik</td>
                                <td class="text-center">
                                    @if($berkas->file_aps_publik == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_publik }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                    <a class="btn btn-outline-danger" href="{{ route('berkas.aps_layanan_publik.ubah_berkas', $berkas->id) }}"><i class="bi bi-pencil"></i>Ganti</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Aplikasi Administrasi Pemerintahan</td>
                                <td class="text-center">
                                    @if($berkas->file_aps_pemerintah == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_pemerintah }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                    <a class="btn btn-outline-danger" href="{{ route('berkas.aps_pemerintahan.ubah_berkas', $berkas->id) }}"><i class="bi bi-pencil"></i>Ganti</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Call Center</td>
                                <td class="text-center">
                                    @if($berkas->file_call_center == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_call_center }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                    <a class="btn btn-outline-danger" href="{{ route('berkas.call_center.ubah_berkas', $berkas->id) }}"><i class="bi bi-pencil"></i>Ganti</a>
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Website</td>
                                <td class="text-center">
                                    @if($berkas->file_website == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_website }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                    <a class="btn btn-outline-danger" href="{{ route('berkas.website.ubah_berkas', $berkas->id) }}"><i class="bi bi-pencil"></i>Ganti</a>
                                </td>
                            </tr>
                            @elseif($berkas->posisi == 'Admin')<tr>
                                <td>Layanan Aplikasi Publik</td>
                                <td class="text-center">
                                    @if($berkas->file_aps_publik == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_publik }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Administrasi Pemerintahan</td>
                                <td class="text-center">
                                    @if($berkas->file_aps_pemerintah == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_pemerintah }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Call Center</td>
                                <td class="text-center">
                                    @if($berkas->file_call_center == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_call_center }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Layanan Website</td>
                                <td class="text-center">
                                    @if($berkas->file_website == null)
                                    <a class="btn btn-outline-primary" target="_blank" href="404"><i class="bi bi-eye"></i>Lihat</a>
                                    @else
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_website }}"><i class="bi bi-eye"></i>Lihat</a>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
</section>

@endsection