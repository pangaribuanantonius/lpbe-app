<?php

namespace App\Http\Controllers;

use App\Models\Website; 
use App\Models\User;
use App\Models\Instansi;
use App\Models\Penandatanganan; 
use PDF;
use TCPDF;
use View;
use App\Exports\TesExport;
use App\Exports\LaporanTerkirimAplikasi2021Export;
use App\Exports\LaporanTerkirimAplikasi2021AdmPemerintahExport;
use App\Exports\InstansiBelumInputAplikasi2021Export;
use App\Exports\InstansiStatusPendingAplikasi2021Export;
use App\Exports\InstansiStatusTerkirimAplikasi2021Export;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Carbon\Carbon;

class Website2021Controller extends Controller
{
    public function create(){
        $layanan = request('layanan');
        $tahun = request('tahun');
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('website.2021.create', ['nama_instansi' => $nama_instansi]);
    }

    public function store(Request $request){
        \App\Models\Website::create([
            'id' => \Str::random(8),
            'tahun' => $request->tahun,
            'instansi_id' => $request->instansi_id,
            'nama_website' => $request->nama_website,
            'deskripsi_website' => $request->deskripsi_website,
            'url' => $request->url,
            'pengembang' => $request->pengembang,
            'tempat' => $request->tempat,
            'rahasia' => $request->rahasia,
            'ramah_anak' => $request->ramah_anak,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => 'Sedang Proses',
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }

    public function edit(Website $website){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        return view('website.2021.edit', ['website' => $website, 'nama_instansi' => $nama_instansi]);
    }

    public function update(Request $request, Website $website){
        $website->update([
            'tahun' => $request->tahun,
            'nama_website' => $request->nama_website,
            'deskripsi_website' => $request->deskripsi_website,
            'url' => $request->url,
            'pengembang' => $request->pengembang,
            'tempat' => $request->tempat,
            'rahasia' => $request->rahasia,
            'ramah_anak' => $request->ramah_anak,
            'nama_pic' => $request->nama_pic,
            'jabatan_pic' => $request->jabatan_pic,
            'kontak' => $request->kontak,
            'status' => 'Sedang Proses',
        ]);
        return redirect('layanan/index?layanan=aplikasi&jenisaplikasi=website&tahun='.request('tahun').'')->with('success', 'Berhasil Menambah Data!');
    }


}
