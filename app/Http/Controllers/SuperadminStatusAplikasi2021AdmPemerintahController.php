<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;

use Illuminate\Http\Request;

class SuperadminStatusAplikasi2021AdmPemerintahController extends Controller
{
    public function updatestatus(Request $request){
        $instansi_id = $request->instansi_id;
        $tahun = $request->tahun;
        \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Administrasi Pemerintah')->Where('tahun', '2021')->update([
            'status' => $request->status,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=administrasi_pemerintah&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }

    public function verifadmin(Request $request, Aplikasi $aplikasi){
        $instansi_id = $request->instansi_id;
        $catatan = $request->filled('catatan') ? $request->catatan : 'Kosong';
        $aplikasi->update([
            'verifikasi' => $request->verifikasi,
            'catatan' => $catatan,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=administrasi_pemerintah&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}
