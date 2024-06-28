<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;
use Illuminate\Http\Request;

class StatusAplikasi2021Controller extends Controller
{
    public function updatestatus(Request $request){
        $jenis_aplikasi = 'Layanan Publik';
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $tahun = request('tahun');
        \App\Models\Aplikasi::Where('instansi_id', $instansi_id)->Where('jenis_aplikasi', $jenis_aplikasi)->Where('tahun', '2021')->update([
            'status' => 'Final',
        ]);
         return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=layanan_publik&tahun=2021')->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}