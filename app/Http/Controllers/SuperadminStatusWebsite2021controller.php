<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;
use App\Models\CallCenter;
use App\Models\Website;
use Illuminate\Http\Request;

class SuperadminStatusWebsite2021Controller extends Controller
{
    public function updatestatus(Request $request){
        $instansi_id = $request->instansi_id;
        $tahun = $request->tahun;
        \App\Models\Website::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->update([
            'status' => $request->status,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=website&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }

    public function verifadmin(Request $request, Website $website){
        $instansi_id = $request->instansi_id;
        $catatan = $request->filled('catatan') ? $request->catatan : 'Kosong';
        $website->update([
            'verifikasi' => $request->verifikasi,
            'catatan' => $catatan,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=website&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}
