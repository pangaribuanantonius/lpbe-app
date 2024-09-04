<?php

namespace App\Http\Controllers;

use App\Models\Aplikasi; 
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
            'nama'
        ]);
    }


}
