<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;

use Illuminate\Http\Request;

class SuperadminStatusAplikasi2021Controller extends Controller
{
    public function updatestatus(Request $request, Aplikasi $aplikasi){
        $instansi_id = $request->instansi_id;
        $tahun = $request->tahun;
        \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', 'Layanan Publik')->Where('tahun', '2021')->update([
            'status' => $request->status,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=layanan_publik&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}