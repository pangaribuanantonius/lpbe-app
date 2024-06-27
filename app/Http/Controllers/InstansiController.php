<?php

namespace App\Http\Controllers;
use App\Models\Instansi;
use App\Models\Kecamatan;

use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function datainstansi(){
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        return view('instansi.datainstansi', ['instansi' => $instansi]);
    }

    public function create(){
        $kecamatan = Kecamatan::orderBy('nama_kecamatan', 'asc')->get();
        return view('instansi.create', ['kecamatan' => $kecamatan]);
    }

    public function store(Request $request){
            Instansi::create([
                'id' => \Str::random(8),
                'nama_instansi' => $request->nama_instansi,
            ]);
       
        return redirect('superadmin/datainstansi')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Instansi $instansi){
        return view('instansi.edit', ['instansi' => $instansi]);
    }

    public function update(Request $request, Instansi $instansi){
             $instansi->update([
                'nama_instansi' => $request->nama_instansi,
            ]);
       
        return redirect('superadmin/datainstansi')->with('update', 'Berhasil Mengubah Data!');
    }

    public function destroy(Request $request, Instansi $instansi){
             $instansi::destroy($instansi->id);
       
        return redirect('superadmin/datainstansi')->with('delete', 'Berhasil Menghapus Data!');
    }

}
