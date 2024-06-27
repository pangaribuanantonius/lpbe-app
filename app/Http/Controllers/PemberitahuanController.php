<?php

namespace App\Http\Controllers;
use App\Models\Pemberitahuan;

use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    public function index(){
        $pemberitahuan = Pemberitahuan::all();
        return view('pemberitahuan.index', ['pemberitahuan' => $pemberitahuan]);
    }

    public function create(){
        return view('pemberitahuan.create');
    }

    public function store(Request $request){
        Pemberitahuan::create([
            'id' => \Str::random(8),
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
        ]);
        return redirect('pemberitahuan/index')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Pemberitahuan $pemberitahuan){
        return view('pemberitahuan.edit', ['pemberitahuan' => $pemberitahuan]);
    }

    public function update(Request $request, Pemberitahuan $pemberitahuan){
        $pemberitahuan->update([
            'isi_pemberitahuan' => $request->isi_pemberitahuan,
        ]);
        return redirect('pemberitahuan/index')->with('update', 'Berhasil Mengubah Data!');
    }
    
}
