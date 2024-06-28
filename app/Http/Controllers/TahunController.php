<?php

namespace App\Http\Controllers;
use App\Models\Tahun;
use Illuminate\Http\Request;

class TahunController extends Controller
{
    public function create(){
        return view('tahun.create');
    }

    public function store(Request $request){
        Tahun::create([
            'id' => \Str::random(8),
            'tahun' => $request->tahun,
        ]);
        return redirect('superadmin/tahun')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Tahun $tahun){
        return view('tahun.edit', ['tahun' => $tahun]);
    }

    public function update(Request $request, Tahun $tahun){
        $tahun->update([
            'tahun' => $request->tahun,
        ]);
        return redirect('superadmin/tahun')->with('update', 'Berhasil Mengubah Data!');
    }

    public function destroy(Request $request, Tahun $tahun){
            $tahun::destroy($tahun->id);
        /*return redirect('info/index')->with(['flashdata' => 'Berhasil']);*/
       return redirect('superadmin/tahun')->with('delete', 'Berhasil Menghapus Data!');
    }
}
