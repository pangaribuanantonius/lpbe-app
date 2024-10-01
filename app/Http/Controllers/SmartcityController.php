<?php

namespace App\Http\Controllers;
use App\Models\SmartCity;
use App\Models\JawabanSmartcity;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SmartcityController extends Controller
{
    public function formkuesionersmartcity(){
        $year =  Carbon::now()->year; // Mengambil tahun saat ini
        // $pertanyaan = Smartcity::orderBy('no_urut', 'asc')->get();
        $smartgovernance = Smartcity::where('dimensi_id', 'fcnoIREe')->get();
        $smartbranding = Smartcity::where('dimensi_id', 'e99K36Hi')->get();
        $smarteconomy = Smartcity::where('dimensi_id', 'rL0TxVJL')->get();
        return view('smartcity.formkuesionersmartcity', ['smartgovernance' => $smartgovernance, 'smartbranding' => $smartbranding, 'smarteconomy' => $smarteconomy, 'year' => $year]);
    }

    public function simpan_jawaban(Request $request){
        // Validasi data yang masuk
        $request->validate([
            'instansi_id' => 'required',
            'pertanyaan_id' => 'required|array',
            'jawaban' => 'required|array',
        ]);

        // Loop melalui setiap jawaban yang disubmit
        foreach ($request->pertanyaan_id as $index => $pertanyaanId) {
            $jawaban = $request->jawaban[$pertanyaanId];

            // Simpan jawaban ke database
            JawabanSmartcity::create([
                'id' => \Str::random(8),
                'tahun' => $request->tahun,
                'instansi_id' => $request->instansi_id,
                'pertanyaan_id' => $pertanyaanId,
                'jawaban' => $jawaban,
            ]);
        }

        // Redirect ke halaman lain dengan pesan sukses
        return redirect()->back()->with('success', 'Jawaban berhasil disimpan!');
    }
}
