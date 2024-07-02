<?php

namespace App\Http\Controllers;
use App\Models\Aplikasi;
use App\Models\Instansi;
use App\Models\CallCenter;
use Illuminate\Http\Request;

class SuperadminStatusCallCenter2021Controller extends Controller
{
    public function updatestatus(Request $request){
        $instansi_id = $request->instansi_id;
        $tahun = $request->tahun;
        \App\Models\CallCenter::Where('instansi_id', $instansi_id)->Where('tahun', '2021')->update([
            'status' => $request->status,
        ]);
        return redirect('layanansuperadmin/index?layanan=aplikasi&jenisaplikasi=call_center&tahun=2021&instansi_id='.request('instansi_id'))->with('updatestatus', 'Berhasil Memperbarui Data!');
    }
}
