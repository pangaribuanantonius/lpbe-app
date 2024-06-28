<?php

namespace App\Http\Controllers;
use App\Models\Penandatanganan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class PenandatangananController extends Controller
{

    public function create(){
        $kecamatan = Kecamatan::all();
        return view('penandatanganan.create', ['kecamatan' => $kecamatan]);
    }

    public function edit(Penandatanganan $penandatanganan){
        $kecamatan = Kecamatan::all();
        return view('penandatanganan.edit', ['penandatanganan' => $penandatanganan, 'kecamatan' => $kecamatan]);
    }


    /*public function store2(Request $request){
        $datasudahvalidasi = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);
        \App\Models\Penandatanganan::create([
         'id' => \Str::random(8),
         'nama' => $datasudahvalidasi->nama,
         'nip' => $datasudahvalidasi->nip,
         'jabatan' => $datasudahvalidasi->jabatan,

        ]);
        return redirect('menu/pengaturan');
    }*/

    public function store(Request $request){
        $datasudahvalidasi = $request->validate([
            'instansi_id' => 'required',
            'kecamatan_id' => 'required',
            'user_id' => 'required',
            'nama' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
            
        ]);
            \App\Models\Penandatanganan::create([
                'id' => \Str::random(8),
                'user_id'  => $request->user_id,
                'instansi_id' => $request->instansi_id,
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'kecamatan_id' => $request->kecamatan_id,
                
            ]);
       
        return redirect('menu/penandatanganan')->with('success', 'Berhasil Menambah Data!');
    }

    public function update(Request $request, Penandatanganan $penandatanganan){
             $penandatanganan->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'kecamatan_id' => $request->kecamatan_id,
                
            ]);
       
        return redirect('menu/penandatanganan')->with('update', 'Berhasil Ubah Data!');
    }

}
