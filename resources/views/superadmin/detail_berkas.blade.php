@extends('sidebar.sidebarpendataanaplikasiadmin')
@section('monevaplikasiadmin')


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
                            <tr>
                                <td>{{ $berkas->file_aps_publik }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_publik }}"><i class="bi bi-eye"></i>Lihat</a>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $berkas->file_aps_pemerintah }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_aps_pemerintah }}"><i class="bi bi-eye"></i>Lihat</a>
                                   
                                </td>
                            </tr>
                            <tr>
                                <td>{{ $berkas->file_call_center }}</td>
                                <td class="text-center">
                                    <a class="btn btn-outline-primary" target="_blank" href="{{ url('/')}}/konten/berkas/{{ $berkas->file_call_center }}"><i class="bi bi-eye"></i>Lihat</a>
                                   
                                </td>
                            </tr>
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
</section>

@endsection