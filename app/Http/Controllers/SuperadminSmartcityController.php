<?php

namespace App\Http\Controllers;
use App\Models\SmartCity;
use App\Models\DimensiSmartcity;
use App\Models\Instansi;
use Illuminate\Http\Request;

class SuperadminSmartcityController extends Controller
{

    public function data_pertanyaan(){
        $listpertanyaan = SmartCity::orderBy('no_urut', 'asc')->get();
        return view('superadminsmartcity.data_pertanyaan', ['listpertanyaan' => $listpertanyaan]);
    }

    public function create(){
        $list_instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        return view('superadminsmartcity.create', ['list_instansi' => $list_instansi]);
    }

    public function simpan_pertanyaan(Request $request){
        \App\Models\SmartCity::create([
            'id' => \Str::random(8),
            'no_urut' => $request->no_urut,
            'pertanyaan' => $request->pertanyaan,
            'pilihan1' => $request->pilihan1,
            'pilihan2' => $request->pilihan2,
            'pilihan3' => $request->pilihan3,
            'pilihan4' => $request->pilihan4,
            'instansi_id_1' => $request->instansi_id_1,
            'instansi_id_2' => $request->instansi_id_2,
            'instansi_id_3' => $request->instansi_id_3,
            'instansi_id_4' => $request->instansi_id_4,
            'instansi_id_5' => $request->instansi_id_5,
        ]);
        return redirect('superadminsmartcity/create')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit_pertanyaan(SmartCity $pertanyaan){
        $list_instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        return view('superadminsmartcity.edit_pertanyaan', ['pertanyaan' => $pertanyaan, 'list_instansi' => $list_instansi]);
    }
    
}
