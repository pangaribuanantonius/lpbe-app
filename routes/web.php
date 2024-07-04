<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\Aplikasi2021Controller;
use App\Http\Controllers\CallCenter2021Controller;
use App\Http\Controllers\Aplikasi2021AdmPemerintahController;
use App\Http\Controllers\StatusAplikasi2021Controller;
use App\Http\Controllers\StatusAplikasi2021AdmPemerintahController;
use App\Http\Controllers\Aplikasi2022Controller;
use App\Http\Controllers\StatusAplikasi2022Controller;
use App\Http\Controllers\StatusAplikasi2023Controller;
use App\Http\Controllers\StatusAplikasi2024Controller;
use App\Http\Controllers\StatusAplikasi2025Controller;
use App\Http\Controllers\Aplikasi2023Controller;
use App\Http\Controllers\Aplikasi2024Controller;
use App\Http\Controllers\Aplikasi2025Controller;
use App\Http\Controllers\PenandatangananController;
use App\Http\Controllers\MenuSuperAdminController;
use App\Http\Controllers\SuperadminAplikasiController;
use App\Http\Controllers\SuperadminStatusAplikasi2021Controller;
use App\Http\Controllers\SuperadminStatusAplikasi2021AdmPemerintahController;
use App\Http\Controllers\SuperadminStatusAplikasi2022Controller;
use App\Http\Controllers\SuperadminStatusAplikasi2023Controller;
use App\Http\Controllers\SuperadminStatusAplikasi2024Controller;
use App\Http\Controllers\SuperadminStatusAplikasi2025Controller;
use App\Http\Controllers\SuperadminStatusCallCenter2021Controller;
use App\Http\Controllers\LaporanAplikasiLayananPublikExcelAdmin2021Controller;
use App\Http\Controllers\LaporanAplikasiPemerintahAdmin2021Controller;
use App\Http\Controllers\SpbeController;
use App\Http\Controllers\Spbe2022Controller;
use App\Http\Controllers\Spbe2023Controller;
use App\Http\Controllers\Spbe2024Controller;
use App\Http\Controllers\StatusSpbe2022Controller;
use App\Http\Controllers\StatusSpbe2023Controller; 
use App\Http\Controllers\StatusSpbe2024Controller;
use App\Http\Controllers\SuperadminStatusSpbe2023Controller;
use App\Http\Controllers\SuperadminStatusSpbe2024Controller;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\TahunController;
use App\Http\Controllers\PemberitahuanController;
use App\Http\Controllers\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('wellcome');
});*/

Route::get('/', function(){
    return 'testing';
})->name('halaman_depan');

Route::get('/404', function () {
    return view('404');
});

/*Route::get('/superadmin/menu', function () {
    return view('superadmin.menu');
});*/





/*route update status aplikasi layanan publik controller pengguna*/
Route::post('/aplikasi/layanan_publik/2021/updatestatus', [StatusAplikasi2021Controller::class, 'updatestatus'])->name('aplikasi.layanan_publik.2021.updatestatus')->middleware('auth');
/*Route::post('/aplikasi/2022/updatestatus', [StatusAplikasi2022Controller::class, 'updatestatus'])->name('aplikasi.2022.updatestatus')->middleware('auth');
Route::post('/aplikasi/2023/updatestatus', [StatusAplikasi2023Controller::class, 'updatestatus'])->name('aplikasi.2023.updatestatus')->middleware('auth');
Route::post('/aplikasi/2024/updatestatus', [StatusAplikasi2024Controller::class, 'updatestatus'])->name('aplikasi.2024.updatestatus')->middleware('auth');
Route::post('/aplikasi/2025/updatestatus', [StatusAplikasi2025Controller::class, 'updatestatus'])->name('aplikasi.2025.updatestatus')->middleware('auth');*/

/*route update status aplikasi administrasi pemerintah controller pengguna*/
Route::post('/aplikasi/administrasi_pemerintah/2021/updatestatus', [StatusAplikasi2021AdmPemerintahController::class, 'updatestatus'])->name('aplikasi.administrasi_pemerintah.2021.updatestatus')->middleware('auth');
/*Route::post('/aplikasi/2022/updatestatus', [StatusAplikasi2022Controller::class, 'updatestatus'])->name('aplikasi.2022.updatestatus')->middleware('auth');
Route::post('/aplikasi/2023/updatestatus', [StatusAplikasi2023Controller::class, 'updatestatus'])->name('aplikasi.2023.updatestatus')->middleware('auth');
Route::post('/aplikasi/2024/updatestatus', [StatusAplikasi2024Controller::class, 'updatestatus'])->name('aplikasi.2024.updatestatus')->middleware('auth');
Route::post('/aplikasi/2025/updatestatus', [StatusAplikasi2025Controller::class, 'updatestatus'])->name('aplikasi.2025.updatestatus')->middleware('auth');*/

/*route update status spbe controller pengguna*/
Route::post('/spbe/2022/updatestatus', [StatusSpbe2022Controller::class, 'updatestatus'])->name('spbe.2022.updatestatus')->middleware('auth');
Route::post('/spbe/2023/updatestatus', [StatusSpbe2023Controller::class, 'updatestatus'])->name('spbe.2023.updatestatus')->middleware('auth');
Route::post('/spbe/2024/updatestatus', [StatusSpbe2024Controller::class, 'updatestatus'])->name('spbe.2024.updatestatus')->middleware('auth');

/*menu controller pengguna*/
Route::get('/menu/index', [MenuController::class, 'index'])->name('menu.index')->middleware('auth');
Route::get('/menu/monitoring', [MenuController::class, 'monitoring'])->name('menu.monitoring')->middleware('auth');
Route::get('/menu/penandatanganan', [MenuController::class, 'penandatanganan'])->name('menu.penandatanganan')->middleware('auth');

Route::get('/menu/aplikasi', [MenuController::class, 'aplikasi'])->name('menu.aplikasi')->middleware('auth');
Route::get('/menu/kirimaps', [MenuController::class, 'kirimaplikasi'])->name('menu.kirimaps')->middleware('auth');


/*penandatanganan controller pengguna*/
Route::get('/penandatanganan/create', [PenandatangananController::class, 'create'])->name('penandatanganan.create')->middleware('auth');
Route::post('/penandatanganan/store', [PenandatangananController::class, 'store'])->name('penandatanganan.store')->middleware('auth');
Route::get('/penandatanganan/{penandatanganan}/edit', [PenandatangananController::class, 'edit'])->name('penandatanganan.edit')->middleware('auth');
Route::patch('/penandatanganan/{penandatanganan}/edit', [PenandatangananController::class, 'update'])->name('penandatanganan.edit')->middleware('auth');

/*layanan pengguna*/
Route::get('/layanan/index', [AplikasiController::class, 'index'])->name('layanan.index')->middleware('auth');

/*layanan admin*/
Route::get('/layanansuperadmin/index', [SuperadminAplikasiController::class, 'index'])->name('layanansuperadmin.index')->middleware('auth');

/*urusanaplikasiadmpemerintah*/
Route::get('/urusanaplikasiadmpemerintah/create', [MenuSuperAdminController::class, 'create'])->name('urusanaplikasiadmpemerintah.create')->middleware('auth');
Route::post('/urusanaplikasiadmpemerintah/store', [MenuSuperAdminController::class, 'store'])->name('urusanaplikasiadmpemerintah.store')->middleware('auth');
Route::get('/urusanaplikasiadmpemerintah/{urusanaplikasiadmpemerintah}/edit', [MenuSuperAdminController::class, 'edit'])->name('urusanaplikasiadmpemerintah.edit')->middleware('auth');
Route::patch('/urusanaplikasiadmpemerintah/{urusanaplikasiadmpemerintah}/edit', [MenuSuperAdminController::class, 'update'])->name('urusanaplikasiadmpemerintah.edit')->middleware('auth');
Route::delete('/urusanaplikasiadmpemerintah/{urusanaplikasiadmpemerintah}/delete', [MenuSuperAdminController::class, 'destroy'])->name('urusanaplikasiadmpemerintah.delete')->middleware('auth');

/*bidangurusanaplikasipemerintah*/
Route::get('/bidangurusanaplikasiadmpemerintah/create/{urusan_id}', [MenuSuperAdminController::class, 'createbidangurusan'])->name('bidangurusanaplikasiadmpemerintah.create')->middleware('auth');
Route::post('/bidangurusanaplikasiadmpemerintah/simpanbidangurusan', [MenuSuperAdminController::class, 'simpanbidangurusan'])->name('bidangurusanaplikasiadmpemerintah.simpanbidangurusan')->middleware('auth');
Route::get('/bidangurusanaplikasiadmpemerintah/{bidangurusan1}/edit', [MenuSuperAdminController::class, 'editbidangurusan'])->name('bidangurusanaplikasiadmpemerintah.edit')->middleware('auth');
Route::patch('/bidangurusanaplikasiadmpemerintah/{bidangurusan1}/edit', [MenuSuperAdminController::class, 'updatebidangurusan'])->name('bidangurusanaplikasiadmpemerintah.edit')->middleware('auth');
Route::delete('/bidangurusanaplikasiadmpemerintah/{bidangurusan1}/delete', [MenuSuperAdminController::class, 'hapusbidangurusan'])->name('bidangurusanaplikasiadmpemerintah.delete')->middleware('auth');


/*aplikasi layanan publik tahun 2021 controller pengguna*/
Route::get('/aplikasi/layanan_publik/2021/create', [Aplikasi2021Controller::class, 'create'])->name('aplikasi.layanan_publik.2021.create')->middleware('auth');
Route::post('/aplikasi/layanan_publik/2021/store', [Aplikasi2021Controller::class, 'store'])->name('aplikasi.layanan_publik.2021.store')->middleware('auth');
Route::get('/aplikasi/layanan_publik/2021/{aplikasi}/edit', [Aplikasi2021Controller::class, 'edit'])->name('aplikasi.layanan_publik.2021.edit')->middleware('auth');
Route::patch('/aplikasi/layanan_publik/2021/{aplikasi}/edit', [Aplikasi2021Controller::class, 'update'])->name('aplikasi.layanan_publik.2021.edit')->middleware('auth');
Route::delete('/aplikasi/layanan_publik/2021/{aplikasi}/delete', [Aplikasi2021Controller::class, 'destroy'])->name('aplikasi.layanan_publik.2021.delete')->middleware('auth');
Route::get('/aplikasi/layanan_publik/2021/terkirim', [Aplikasi2021Controller::class, 'terkirim'])->name('aplikasi.layanan_publik.2021.terkirim')->middleware('auth');

/*aplikasi adm pemerintah tahun 2021 controller pengguna*/
Route::get('/aplikasi/administrasi_pemerintah/2021/create', [Aplikasi2021AdmPemerintahController::class, 'create'])->name('aplikasi.administrasi_pemerintah.2021.create')->middleware('auth');
Route::post('/aplikasi/administrasi_pemerintah/2021/store', [Aplikasi2021AdmPemerintahController::class, 'store'])->name('aplikasi.administrasi_pemerintah.2021.store')->middleware('auth');
Route::get('/aplikasi/administrasi_pemerintah/2021/{aplikasi}/edit', [Aplikasi2021AdmPemerintahController::class, 'edit'])->name('aplikasi.administrasi_pemerintah.2021.edit')->middleware('auth');
Route::patch('/aplikasi/administrasi_pemerintah/2021/{aplikasi}/edit', [Aplikasi2021AdmPemerintahController::class, 'update'])->name('aplikasi.administrasi_pemerintah.2021.edit')->middleware('auth');
Route::delete('/aplikasi/administrasi_pemerintah/2021/{aplikasi}/delete', [Aplikasi2021AdmPemerintahController::class, 'destroy'])->name('aplikasi.administrasi_pemerintah.2021.delete')->middleware('auth');
Route::get('/aplikasi/administrasi_pemerintah/2021/terkirim', [Aplikasi2021AdmPemerintahController::class, 'terkirim'])->name('aplikasi.administrasi_pemerintah.2021.terkirim')->middleware('auth');

/*layanan call center tahun 2021 controller pengguna*/
Route::get('/call_center/2021/create', [CallCenter2021Controller::class, 'create'])->name('call_center.2021.create')->middleware('auth');
Route::post('/call_center/2021/store', [CallCenter2021Controller::class, 'store'])->name('call_center.2021.store')->middleware('auth');
Route::get('/call_center/2021/{call_center}/edit', [CallCenter2021Controller::class, 'edit'])->name('call_center.2021.edit')->middleware('auth');
Route::patch('/call_center/2021/{call_center}/edit', [CallCenter2021Controller::class, 'update'])->name('call_center.2021.edit')->middleware('auth');
Route::delete('/call_center/2021/{call_center}/delete', [CallCenter2021Controller::class, 'destroy'])->name('call_center.2021.delete')->middleware('auth');
Route::get('/call_center/2021/terkirim', [CallCenter2021Controller::class, 'terkirim'])->name('call_center.2021.terkirim')->middleware('auth');
Route::post('/call_center/2021/updatestatuscallcenter', [CallCenter2021Controller::class, 'updatestatuscallcenter'])->name('call_center.2021.updatestatuscallcenter')->middleware('auth');

/*aplikasi 2022 controller pengguna*/
Route::get('/aplikasi/2022/create', [Aplikasi2022Controller::class, 'create'])->name('aplikasi.2022.create')->middleware('auth');
Route::post('/aplikasi/2022/store', [Aplikasi2022Controller::class, 'store'])->name('aplikasi.2022.store')->middleware('auth');
Route::get('/aplikasi/2022/{aplikasi}/edit', [Aplikasi2022Controller::class, 'edit'])->name('aplikasi.2022.edit')->middleware('auth');
Route::patch('/aplikasi/2022/{aplikasi}/edit', [Aplikasi2022Controller::class, 'update'])->name('aplikasi.2022.edit')->middleware('auth');
Route::delete('/aplikasi/2022/{aplikasi}/delete', [Aplikasi2022Controller::class, 'destroy'])->name('aplikasi.2022.delete')->middleware('auth');
Route::get('/aplikasi/2022/terkirim', [Aplikasi2022Controller::class, 'terkirim'])->name('aplikasi.2022.terkirim')->middleware('auth');

/*aplikasi 2023 controller pengguna*/
Route::get('/aplikasi/2023/create', [Aplikasi2023Controller::class, 'create'])->name('aplikasi.2023.create')->middleware('auth');
Route::post('/aplikasi/2023/store', [Aplikasi2023Controller::class, 'store'])->name('aplikasi.2023.store')->middleware('auth');
Route::get('/aplikasi/2023/{aplikasi}/edit', [Aplikasi2023Controller::class, 'edit'])->name('aplikasi.2023.edit')->middleware('auth');
Route::patch('/aplikasi/2023/{aplikasi}/edit', [Aplikasi2023Controller::class, 'update'])->name('aplikasi.2023.edit')->middleware('auth');
Route::delete('/aplikasi/2023/{aplikasi}/delete', [Aplikasi2023Controller::class, 'destroy'])->name('aplikasi.2023.delete')->middleware('auth');
Route::get('/aplikasi/2023/terkirim', [Aplikasi2023Controller::class, 'terkirim'])->name('aplikasi.2023.terkirim')->middleware('auth');

/*aplikasi 2024 controller pengguna*/
Route::get('/aplikasi/2024/create', [Aplikasi2024Controller::class, 'create'])->name('aplikasi.2024.create')->middleware('auth');
Route::post('/aplikasi/2024/store', [Aplikasi2024Controller::class, 'store'])->name('aplikasi.2024.store')->middleware('auth');
Route::get('/aplikasi/2024/{aplikasi}/edit', [Aplikasi2024Controller::class, 'edit'])->name('aplikasi.2024.edit')->middleware('auth');
Route::patch('/aplikasi/2024/{aplikasi}/edit', [Aplikasi2024Controller::class, 'update'])->name('aplikasi.2024.edit')->middleware('auth');
Route::delete('/aplikasi/2024/{aplikasi}/delete', [Aplikasi2024Controller::class, 'destroy'])->name('aplikasi.2024.delete')->middleware('auth');
Route::get('/aplikasi/2024/terkirim', [Aplikasi2024Controller::class, 'terkirim'])->name('aplikasi.2024.terkirim')->middleware('auth');

/*aplikasi 2025 controller pengguna*/
Route::get('/aplikasi/2025/create', [Aplikasi2025Controller::class, 'create'])->name('aplikasi.2025.create')->middleware('auth');
Route::post('/aplikasi/2025/store', [Aplikasi2025Controller::class, 'store'])->name('aplikasi.2025.store')->middleware('auth');
Route::get('/aplikasi/2025/{aplikasi}/edit', [Aplikasi2025Controller::class, 'edit'])->name('aplikasi.2025.edit')->middleware('auth');
Route::patch('/aplikasi/2025/{aplikasi}/edit', [Aplikasi2025Controller::class, 'update'])->name('aplikasi.2025.edit')->middleware('auth');
Route::delete('/aplikasi/2025/{aplikasi}/delete', [Aplikasi2025Controller::class, 'destroy'])->name('aplikasi.2025.delete')->middleware('auth');
Route::get('/aplikasi/2025/terkirim', [Aplikasi2025Controller::class, 'terkirim'])->name('aplikasi.2025.terkirim')->middleware('auth');

/*cetak aplikasi layanan publik pdf controller pengguna*/
Route::get('/aplikasi/layanan_publik/2021/cetaklaporanpdf', [Aplikasi2021Controller::class, 'cetakaplikasipublikpdf_2021'])->name('aplikasi.layanan_publik.2021.cetaklaporanpdf')->middleware('auth');
Route::get('/aplikasi/2022/cetakaplikasipdf_2022', [Aplikasi2022Controller::class, 'cetakaplikasipdf_2022'])->name('aplikasi.2022.cetakaplikasipdf_2022')->middleware('auth');
Route::get('/aplikasi/2023/cetakaplikasipdf_2023', [Aplikasi2023Controller::class, 'cetakaplikasipdf_2023'])->name('aplikasi.2023.cetakaplikasipdf_2023')->middleware('auth');
Route::get('/aplikasi/2024/cetakaplikasipdf_2024', [Aplikasi2024Controller::class, 'cetakaplikasipdf_2024'])->name('aplikasi.2024.cetakaplikasipdf_2024')->middleware('auth');
Route::get('/aplikasi/2025/cetakaplikasipdf_2025', [Aplikasi2025Controller::class, 'cetakaplikasipdf_2025'])->name('aplikasi.2025.cetakaplikasipdf_2025')->middleware('auth');

/*cetak aplikasi layanan administrasi pemerintahan pdf controller pengguna*/
Route::get('/aplikasi/administrasi_pemerintah/2021/cetaklaporanpdf', [Aplikasi2021Controller::class, 'cetakaplikasipemerintahpdf_2021'])->name('aplikasi.administrasi_pemerintah.2021.cetaklaporanpdf')->middleware('auth');

/*cetak layanan call center pdf controller pengguna*/
Route::get('/call_center/2021/cetaklaporanpdf', [CallCenter2021Controller::class, 'cetakcallcenterpdf_2021'])->name('call_center.2021.cetaklaporanpdf')->middleware('auth');

/*cetak aplikasi layanan publik excel controller pengguna 2021*/
Route::get('/aplikasi/layanan_publik/2021/laporanterkirimaplikasipublikexcel2021', [Aplikasi2021Controller::class, 'laporanterkirimaplikasipublikexcel2021'])->name('aplikasi.layanan_publik.2021.laporanterkirimaplikasipublikexcel2021')->middleware('auth');

/*cetak aplikasi adm pemerintah excel controller pengguna 2021*/
Route::get('/aplikasi/administrasi_pemerintah/2021/laporanterkirimaplikasiadmexcel2021', [Aplikasi2021AdmPemerintahController::class, 'laporanterkirimaplikasiadmexcel2021'])->name('aplikasi.administrasi_pemerintah.2021.laporanterkirimaplikasiadmexcel2021')->middleware('auth');

/*cetak aplikasi excel controller pengguna 2022*/
Route::get('/aplikasi/2022/laporanterkirimaplikasiexcel2022', [Aplikasi2022Controller::class, 'laporanterkirimaplikasiexcel2022'])->name('aplikasi.2022.laporanterkirimaplikasiexcel2022')->middleware('auth');

/*cetak aplikasi excel controller pengguna 2023*/
Route::get('/aplikasi/2023/laporanterkirimaplikasiexcel2023', [Aplikasi2023Controller::class, 'laporanterkirimaplikasiexcel2023'])->name('aplikasi.2023.laporanterkirimaplikasiexcel2023')->middleware('auth');

/*cetak aplikasi excel controller pengguna 2024*/
Route::get('/aplikasi/2024/laporanterkirimaplikasiexcel2024', [Aplikasi2024Controller::class, 'laporanterkirimaplikasiexcel2024'])->name('aplikasi.2024.laporanterkirimaplikasiexcel2024')->middleware('auth');

/*cetak aplikasi excel controller pengguna 2025*/
Route::get('/aplikasi/2025/laporanterkirimaplikasiexcel2025', [Aplikasi2025Controller::class, 'laporanterkirimaplikasiexcel2025'])->name('aplikasi.2025.laporanterkirimaplikasiexcel2025')->middleware('auth');

/*cetak aplikasi excel controller pengguna 2026*/
Route::get('/aplikasi/2026/laporanterkirimaplikasiexcel2026', [Aplikasi2026Controller::class, 'laporanterkirimaplikasiexcel2026'])->name('aplikasi.2026.laporanterkirimaplikasiexcel2026')->middleware('auth');

/*cetak spbe controller pengguna*/
Route::get('/spbe/2024/cetakspbepdf_2024', [Spbe2024Controller::class, 'cetakspbepdf_2024'])->name('spbe.2024.cetakspbepdf_2024')->middleware('auth');


/*cetak aplikasi adm pemerintahan excel controller pengguna 2021*/
Route::get('/aplikasi/administrasi_pemerintah/2021/laporanterkirimaplikasipemerintahexcel2021', [Aplikasi2021Controller::class, 'laporanterkirimaplikasipemerintahexcel2021'])->name('aplikasi.administrasi_pemerintah.2021.laporanterkirimaplikasipemerintahexcel2021')->middleware('auth');

/*cetak call center 2021 excel controller pengguna*/
Route::get('/call_center/2021/laporanterkirimcallcenterexcel2021', [CallCenter2021Controller::class, 'laporanterkirimcallcenterexcel2021'])->name('call_center.2021.laporanterkirimcallcenterexcel2021')->middleware('auth');





/*layanan superadmin controller*/
Route::get('/superadmin/menu', [MenuSuperAdminController::class, 'menu'])->name('superadmin.menu')->middleware('auth')->middleware('auth');
/*Route::get('/superadmin/opdbeluminputaplikasi', [MenuSuperAdminController::class, 'opdbeluminputaplikasi'])->name('superadmin.opdbeluminputaplikasi')->middleware('auth');*/
Route::get('/superadmin/opdpending', [MenuSuperAdminController::class, 'opdpending'])->name('superadmin.opdpending')->middleware('auth');
Route::get('/superadmin/opdterkirim', [MenuSuperAdminController::class, 'opdterkirim'])->name('superadmin.opdterkirim')->middleware('auth');
Route::get('/superadmin/dataopd', [MenuSuperAdminController::class, 'dataopd'])->name('superadmin.dataopd')->middleware('auth');
Route::get('/superadmin/datainstansi', [MenuSuperAdminController::class, 'datainstansi'])->name('superadmin.datainstansi')->middleware('auth');
Route::get('/superadmin/monitoring', [MenuSuperAdminController::class, 'monitoring'])->name('superadmin.monitoring')->middleware('auth');
Route::get('/superadmin/aplikasi', [MenuSuperAdminController::class, 'aplikasi'])->name('superadmin.aplikasi')->middleware('auth');
Route::get('/superadmin/daftarindikator', [MenuSuperAdminController::class, 'daftarindikator'])->name('superadmin.daftarindikator')->middleware('auth');
Route::get('/superadmin/daftarurusanaplikasiadmpemerintah', [MenuSuperAdminController::class, 'daftarurusanaplikasiadmpemerintah'])->name('superadmin.daftarurusanaplikasiadmpemerintah')->middleware('auth');
Route::get('/superadmin/daftarurusanaplikasiadmpemerintah', [MenuSuperAdminController::class, 'daftarurusanaplikasiadmpemerintah'])->name('superadmin.daftarurusanaplikasiadmpemerintah')->middleware('auth');
Route::get('/superadmin/daftarbidangurusanaplikasiadmpemerintah/{urusan_id}', [MenuSuperAdminController::class, 'daftarbidangurusanaplikasiadmpemerintah'])->name('superadmin.daftarbidangurusanaplikasiadmpemerintah')->middleware('auth');
Route::get('/superadmin/monevaplikasi_admin', [MenuSuperAdminController::class, 'monevaplikasi_admin'])->name('superadmin.monevaplikasi_admin')->middleware('auth');
Route::get('/superadmin/datainstansi', [MenuSuperAdminController::class, 'datainstansi'])->name('superadmin.datainstansi')->middleware('auth');



/*status aplikasi layanan publik controller superadmin*/
Route::post('/superadminaplikasi/layanan_publik/2021/updatestatus', [SuperadminStatusAplikasi2021Controller::class, 'updatestatus'])->name('superadminaplikasi.layanan_publik.2021.updatestatus')->middleware('auth');

/*status aplikasi adm pemerintah controller superadmin*/
Route::post('/superadminaplikasi/administrasi_pemerintah/2021/updatestatus', [SuperadminStatusAplikasi2021AdmPemerintahController::class, 'updatestatus'])->name('superadminaplikasi.administrasi_pemerintah.2021.updatestatus')->middleware('auth');

/*call center controller super admin*/
Route::post('/superadmincall_center/2021/updatestatus', [SuperadminStatusCallCenter2021Controller::class, 'updatestatus'])->name('superadmincall_center.2021.updatestatus')->middleware('auth');


/*Route::post('/superadminaplikasi/2022/updatestatus', [SuperadminStatusAplikasi2022Controller::class, 'updatestatus'])->name('superadminaplikasi.2022.updatestatus')->middleware('auth');
Route::post('/superadminaplikasi/2023/updatestatus', [SuperadminStatusAplikasi2023Controller::class, 'updatestatus'])->name('superadminaplikasi.2023.updatestatus')->middleware('auth');
Route::post('/superadminaplikasi/2024/updatestatus', [SuperadminStatusAplikasi2024Controller::class, 'updatestatus'])->name('superadminaplikasi.2024.updatestatus')->middleware('auth');
Route::post('/superadminaplikasi/2025/updatestatus', [SuperadminStatusAplikasi2025Controller::class, 'updatestatus'])->name('superadminaplikasi.2025.updatestatus')->middleware('auth');*/


/*indikator spbe superadmin*/
Route::get('/superadmin/dataindikatorspbe', [SpbeController::class, 'dataindikatorspbe'])->name('superadmin.dataindikatorspbe')->middleware('auth');
Route::get('/indikatorspbe/create', [SpbeController::class, 'create'])->name('indikatorspbe.create')->middleware('auth');
Route::post('/indikatorspbe/store', [SpbeController::class, 'store'])->name('indikatorspbe.store')->middleware('auth');
Route::get('/indikatorspbe/{indikator}/edit', [SpbeController::class, 'edit'])->name('indikatorspbe.edit')->middleware('auth');
Route::patch('/indikatorspbe/{indikator}/edit', [SpbeController::class, 'update'])->name('indikatorspbe.edit')->middleware('auth');

/*spbe 2022 controller pengguna*/
Route::get('/spbe/2022/index', [SpbeController::class, 'index'])->name('spbe.2022.index')->middleware('auth');
Route::get('/spbe/2022/tambahbuktidukung', [Spbe2022Controller::class, 'tambahbuktidukung'])->name('spbe.2022.tambahbuktidukung')->middleware('auth');
Route::post('/spbe/2022/store', [Spbe2022Controller::class, 'store'])->name('spbe.2022.store')->middleware('auth');
Route::get('/spbe/2022/{spbe}/ubahbuktidukung', [Spbe2022Controller::class, 'ubahbuktidukung'])->name('spbe.2022.ubahbuktidukung')->middleware('auth');
Route::patch('/spbe/2022/{spbe}/ubahbuktidukung', [Spbe2022Controller::class, 'update'])->name('spbe.2022.ubahbuktidukung')->middleware('auth');
Route::delete('/spbe/2022/{spbe}/delete', [Spbe2022Controller::class, 'destroy'])->name('spbe.2022.delete')->middleware('auth');

/*spbe 2023 controller pengguna*/
Route::get('/spbe/2023/index', [SpbeController::class, 'index'])->name('spbe.2023.index')->middleware('auth');
Route::get('/spbe/2023/tambahbuktidukung', [Spbe2023Controller::class, 'tambahbuktidukung'])->name('spbe.2023.tambahbuktidukung')->middleware('auth');
Route::post('/spbe/2023/store', [Spbe2023Controller::class, 'store'])->name('spbe.2023.store')->middleware('auth');
Route::get('/spbe/2023/{spbe}/ubahbuktidukung', [Spbe2023Controller::class, 'ubahbuktidukung'])->name('spbe.2023.ubahbuktidukung')->middleware('auth');
Route::patch('/spbe/2023/{spbe}/ubahbuktidukung', [Spbe2023Controller::class, 'update'])->name('spbe.2023.ubahbuktidukung')->middleware('auth');
Route::delete('/spbe/2023/{spbe}/delete', [Spbe2023Controller::class, 'destroy'])->name('spbe.2023.delete')->middleware('auth');

/*spbe 2024 controller pengguna*/
Route::get('/spbe/2024/tambahbuktidukung', [Spbe2024Controller::class, 'tambahbuktidukung'])->name('spbe.2024.tambahbuktidukung')->middleware('auth');
Route::post('/spbe/2024/store', [Spbe2024Controller::class, 'store'])->name('spbe.2024.store')->middleware('auth');
Route::get('/spbe/2024/{spbe}/ubahbuktidukung', [Spbe2024Controller::class, 'ubahbuktidukung'])->name('spbe.2024.ubahbuktidukung')->middleware('auth');
Route::patch('/spbe/2024/{spbe}/ubahbuktidukung', [Spbe2024Controller::class, 'update'])->name('spbe.2024.ubahbuktidukung')->middleware('auth');
Route::delete('/spbe/2024/{spbe}/delete', [Spbe2024Controller::class, 'destroy'])->name('spbe.2024.delete')->middleware('auth');

/*superadmin spbe super admin*/
Route::post('/superadminspbe/2023/updatestatus', [SuperadminStatusSpbe2023Controller::class, 'updatestatus'])->name('superadminspbe.2023.updatestatus')->middleware('auth');
Route::post('/superadminspbe/2024/updatestatus', [SuperadminStatusSpbe2024Controller::class, 'updatestatus'])->name('superadminspbe.2024.updatestatus')->middleware('auth');

/*menu update data level pengguna*/
Route::get('/pengguna/index/{instansi_id}', [PenggunaController::class, 'index'])->name('pengguna.index')->middleware('auth');
Route::get('/pengguna/addpengguna/{instansi_id}', [PenggunaController::class, 'addpengguna'])->name('pengguna.addpengguna')->middleware('auth');
Route::post('/pengguna/simpanpengguna', [PenggunaController::class, 'simpanpengguna'])->name('pengguna.simpanpengguna')->middleware('auth');
Route::get('/pengguna/{user}/editdata', [PenggunaController::class, 'editdata'])->name('pengguna.editdata')->middleware('auth');
Route::patch('/pengguna/user/{user}/edit', [PenggunaController::class, 'updatedata'])->name('pengguna.edit')->middleware('auth');
Route::delete('/pengguna{user}/delete', [PenggunaController::class, 'destroy'])->name('pengguna.delete')->middleware('auth');
Route::get('/pengguna/{user}/editpassword', [PenggunaController::class, 'editpassword'])->name('pengguna.editpassword')->middleware('auth');
Route::patch('/pengguna/{user}/editpassword', [PenggunaController::class, 'updatepassword'])->name('pengguna.editpassword')->middleware('auth');

/*menu update data  level super admin*/
Route::get('/pengguna/admin', [PenggunaController::class, 'admin'])->name('pengguna.admin')->middleware('auth');
Route::get('/pengguna/{user}/editadmin', [PenggunaController::class, 'editadmin'])->name('pengguna.editadmin')->middleware('auth');
Route::patch('/pengguna/{user}/editadmin', [PenggunaController::class, 'updateadmin'])->name('pengguna.editadmin')->middleware('auth');
Route::get('/pengguna/{user}/editpasswordadmin', [PenggunaController::class, 'editpasswordadmin'])->name('pengguna.editpasswordadmin')->middleware('auth');
Route::patch('/pengguna/{user}/editpasswordadmin', [PenggunaController::class, 'updatepasswordadmin'])->name('pengguna.editpasswordadmin')->middleware('auth');

Route::get('/pengguna/datapengguna', [PenggunaController::class, 'datapengguna'])->name('pengguna.datapengguna')->middleware('auth');
Route::get('/pengguna/{pengguna}/editpengguna', [PenggunaController::class, 'editpengguna'])->name('pengguna.editpengguna')->middleware('auth');
Route::patch('/pengguna/{pengguna}/editpengguna', [PenggunaController::class, 'updatepengguna'])->name('pengguna.editpengguna')->middleware('auth');
Route::patch('/pengguna/{ppp}/updatepengguna', [PenggunaController::class, 'updatepengguna'])->name('pengguna.updatepengguna')->middleware('auth');

Route::get('/pengguna/{pengguna}/editpasspengguna', [PenggunaController::class, 'editpasspengguna'])->name('pengguna.editpasspengguna')->middleware('auth');
Route::patch('/pengguna/{pengguna}/editpasspengguna', [PenggunaController::class, 'updatepasspengguna'])->name('pengguna.editpasspengguna')->middleware('auth');
Route::patch('/pengguna/{ppp}/updatepasspengguna', [PenggunaController::class, 'updatepasspengguna'])->name('pengguna.updatepasspengguna')->middleware('auth');


Route::get('/superadmin/opdbelumentridatapdf', [MenuSuperAdminController::class, 'opdbelumentridatapdf'])->name('superadmin.opdbelumentridatapdf')->middleware('auth');
Route::get('/superadmin/opdbelumentridataexcel', [MenuSuperAdminController::class, 'opdbelumentridataexcel'])->name('superadmin.opdbelumentridataexcel')->middleware('auth');

/*laporan aplikasi layanan publik excel admin 2021*/
Route::get('/superadminaplikasi/layanan_publik/2021/laporanterkirimaplikasipublikexcel2021/{instansi_id}', [LaporanAplikasiLayananPublikExcelAdmin2021Controller::class, 'laporanterkirimaplikasipublikexcel2021'])->name('superadminaplikasi.layanan_publik.2021.laporanterkirimaplikasipublikexcel2021')->middleware('auth');

/*laporan aplikasi administrasi pemerintah excel admin 2021*/
Route::get('/superadminaplikasi/administrasi_pemerintah/2021/laporanterkirimaplikasipemerintahexcel2021/{instansi_id}', [LaporanAplikasiPemerintahAdmin2021Controller::class, 'laporanterkirimaplikasipublikexcel2021'])->name('superadminaplikasi.administrasi_pemerintah.2021.laporanterkirimaplikasipemerintahexcel2021')->middleware('auth');


  

/*laporan aplikasi tahun 2022*/
Route::get('/laporanaplikasi/2022/laporanbelumkirim', [Aplikasi2022Controller::class, 'opdbeluminputaplikasi2022'])->name('laporanaplikasi.2022.laporanbelumkirim')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasipending', [Aplikasi2022Controller::class, 'opdaplikasipending2022'])->name('laporanaplikasi.2022.laporanaplikasipending')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasiterkirim', [Aplikasi2022Controller::class, 'opdaplikasiterkirim2022'])->name('laporanaplikasi.2022.laporanaplikasiterkirim')->middleware('auth'); 
Route::get('/laporanaplikasi/2022/dataopd', [Aplikasi2022Controller::class, 'dataopd'])->name('laporanaplikasi.2022.dataopd')->middleware('auth');

Route::get('/laporanaplikasi/2022/laporanbeluminputaplikasiexcel_2022', [Aplikasi2022Controller::class, 'laporanbeluminputaplikasiexcel_2022'])->name('laporanaplikasi.2022.laporanbeluminputaplikasiexcel_2022')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasipendingexcel_2022', [Aplikasi2022Controller::class, 'laporanaplikasipendingexcel_2022'])->name('laporanaplikasi.2022.laporanaplikasipendingexcel_2022')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasiterkirimexcel_2022', [Aplikasi2022Controller::class, 'laporanaplikasiterkirimexcel_2022'])->name('laporanaplikasi.2022.laporanaplikasiterkirimexcel_2022')->middleware('auth');


/*laporan aplikasi tahun 2023*/
Route::get('/laporanaplikasi/2023/dataopd', [Aplikasi2023Controller::class, 'dataopd'])->name('laporanaplikasi.2023.dataopd')->middleware('auth');

Route::get('/laporanaplikasi/2022/laporanopdbeluminputaplikasipdf_2022', [Aplikasi2022Controller::class, 'laporanopdbeluminputaplikasipdf_2022'])->name('laporanaplikasi.2022.laporanopdbeluminputaplikasipdf_2022')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasipendingpdf_2022', [Aplikasi2022Controller::class, 'laporanaplikasipendingpdf_2022'])->name('laporanaplikasi.2022.laporanaplikasipendingpdf_2022')->middleware('auth');
Route::get('/laporanaplikasi/2022/laporanaplikasiterkirimpdf_2022', [Aplikasi2022Controller::class, 'laporanaplikasiterkirimpdf_2022'])->name('laporanaplikasi.2022.laporanaplikasiterkirimpdf_2022')->middleware('auth');

Route::get('/laporanaplikasi/2023/laporanbeluminputaplikasiexcel_2023', [Aplikasi2023Controller::class, 'laporanbeluminputaplikasiexcel_2023'])->name('laporanaplikasi.2023.laporanbeluminputaplikasiexcel_2023')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasipendingexcel_2023', [Aplikasi2023Controller::class, 'laporanaplikasipendingexcel_2023'])->name('laporanaplikasi.2023.laporanaplikasipendingexcel_2023')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasiterkirimexcel_2023', [Aplikasi2023Controller::class, 'laporanaplikasiterkirimexcel_2023'])->name('laporanaplikasi.2023.laporanaplikasiterkirimexcel_2023')->middleware('auth');

Route::get('/laporanaplikasi/2023/laporanbelumkirim', [Aplikasi2023Controller::class, 'opdbeluminputaplikasi2023'])->name('laporanaplikasi.2023.laporanbelumkirim')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasipending', [Aplikasi2023Controller::class, 'opdaplikasipending2023'])->name('laporanaplikasi.2023.laporanaplikasipending')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasiterkirim', [Aplikasi2023Controller::class, 'opdaplikasiterkirim2023'])->name('laporanaplikasi.2023.laporanaplikasiterkirim')->middleware('auth');

Route::get('/laporanaplikasi/2023/laporanopdbeluminputaplikasipdf_2023', [Aplikasi2023Controller::class, 'laporanopdbeluminputaplikasipdf_2023'])->name('laporanaplikasi.2023.laporanopdbeluminputaplikasipdf_2023')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasipendingpdf_2023', [Aplikasi2023Controller::class, 'laporanaplikasipendingpdf_2023'])->name('laporanaplikasi.2023.laporanaplikasipendingpdf_2023')->middleware('auth');
Route::get('/laporanaplikasi/2023/laporanaplikasiterkirimpdf_2023', [Aplikasi2023Controller::class, 'laporanaplikasiterkirimpdf_2023'])->name('laporanaplikasi.2023.laporanaplikasiterkirimpdf_2023')->middleware('auth');


/*laporan aplikasi tahun 2024*/
Route::get('/laporanaplikasi/2024/laporanbelumkirim', [Aplikasi2024Controller::class, 'opdbeluminputaplikasi2024'])->name('laporanaplikasi.2024.laporanbelumkirim')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasipending', [Aplikasi2024Controller::class, 'opdaplikasipending2024'])->name('laporanaplikasi.2024.laporanaplikasipending')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasiterkirim', [Aplikasi2024Controller::class, 'opdaplikasiterkirim2024'])->name('laporanaplikasi.2024.laporanaplikasiterkirim')->middleware('auth');

Route::get('/laporanaplikasi/2024/laporanopdbeluminputaplikasipdf_2024', [Aplikasi2024Controller::class, 'laporanopdbeluminputaplikasipdf_2024'])->name('laporanaplikasi.2024.laporanopdbeluminputaplikasipdf_2024')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasipendingpdf_2024', [Aplikasi2024Controller::class, 'laporanaplikasipendingpdf_2024'])->name('laporanaplikasi.2024.laporanaplikasipendingpdf_2024')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasiterkirimpdf_2024', [Aplikasi2024Controller::class, 'laporanaplikasiterkirimpdf_2024'])->name('laporanaplikasi.2024.laporanaplikasiterkirimpdf_2024')->middleware('auth');  
Route::get('/laporanaplikasi/2024/dataopd', [Aplikasi2024Controller::class, 'dataopd'])->name('laporanaplikasi.2024.dataopd')->middleware('auth');

Route::get('/laporanaplikasi/2024/laporanbeluminputaplikasiexcel_2024', [Aplikasi2024Controller::class, 'laporanbeluminputaplikasiexcel_2024'])->name('laporanaplikasi.2024.laporanbeluminputaplikasiexcel_2024')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasipendingexcel_2024', [Aplikasi2024Controller::class, 'laporanaplikasipendingexcel_2024'])->name('laporanaplikasi.2024.laporanaplikasipendingexcel_2024')->middleware('auth');
Route::get('/laporanaplikasi/2024/laporanaplikasiterkirimexcel_2024', [Aplikasi2024Controller::class, 'laporanaplikasiterkirimexcel_2024'])->name('laporanaplikasi.2024.laporanaplikasiterkirimexcel_2024')->middleware('auth');


/*laporan aplikasi tahun 2025*/
Route::get('/laporanaplikasi/2025/laporanbelumkirim', [Aplikasi2025Controller::class, 'opdbeluminputaplikasi2025'])->name('laporanaplikasi.2025.laporanbelumkirim')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasipending', [Aplikasi2025Controller::class, 'opdaplikasipending2025'])->name('laporanaplikasi.2025.laporanaplikasipending')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasiterkirim', [Aplikasi2025Controller::class, 'opdaplikasiterkirim2025'])->name('laporanaplikasi.2025.laporanaplikasiterkirim')->middleware('auth');

Route::get('/laporanaplikasi/2025/laporanopdbeluminputaplikasipdf_2025', [Aplikasi2025Controller::class, 'laporanopdbeluminputaplikasipdf_2025'])->name('laporanaplikasi.2025.laporanopdbeluminputaplikasipdf_2025')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasipendingpdf_2025', [Aplikasi2025Controller::class, 'laporanaplikasipendingpdf_2025'])->name('laporanaplikasi.2025.laporanaplikasipendingpdf_2025')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasiterkirimpdf_2025', [Aplikasi2025Controller::class, 'laporanaplikasiterkirimpdf_2025'])->name('laporanaplikasi.2025.laporanaplikasiterkirimpdf_2025')->middleware('auth');  
Route::get('/laporanaplikasi/2025/dataopd', [Aplikasi2025Controller::class, 'dataopd'])->name('laporanaplikasi.2025.dataopd')->middleware('auth');

Route::get('/laporanaplikasi/2025/laporanbeluminputaplikasiexcel_2025', [Aplikasi2025Controller::class, 'laporanbeluminputaplikasiexcel_2025'])->name('laporanaplikasi.2025.laporanbeluminputaplikasiexcel_2025')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasipendingexcel_2025', [Aplikasi2025Controller::class, 'laporanaplikasipendingexcel_2025'])->name('laporanaplikasi.2025.laporanaplikasipendingexcel_2025')->middleware('auth');
Route::get('/laporanaplikasi/2025/laporanaplikasiterkirimexcel_2025', [Aplikasi2025Controller::class, 'laporanaplikasiterkirimexcel_2025'])->name('laporanaplikasi.2025.laporanaplikasiterkirimexcel_2025')->middleware('auth');

/*laporanspbe 2024*/
Route::get('/laporanspbe/2024/laporanbelumkirim', [Spbe2024Controller::class, 'opdbeluminputspbe2024'])->name('laporanspbe.2024.laporanbelumkirim')->middleware('auth');
Route::get('/laporanspbe/2024/laporanspbepending', [Spbe2024Controller::class, 'opdspbepending2024'])->name('laporanspbe.2024.laporanspbepending')->middleware('auth');
Route::get('/laporanspbe/2024/laporanspbeterkirim', [Spbe2024Controller::class, 'opdspbeterkirim2024'])->name('laporanspbe.2024.laporanspbeterkirim')->middleware('auth');

Route::get('/laporanspbe/2024/dataopd', [Spbe2024Controller::class, 'dataopd'])->name('laporanspbe.2024.dataopd')->middleware('auth');

Route::get('/laporanspbe/2024/laporanopdbeluminputspbepdf_2024', [spbe2024Controller::class, 'laporanopdbeluminputspbepdf_2024'])->name('laporanspbe.2024.laporanopdbeluminputspbepdf_2024')->middleware('auth');
Route::get('/laporanspbe/2024/laporanspbependingpdf_2024', [spbe2024Controller::class, 'laporanspbependingpdf_2024'])->name('laporanspbe.2024.laporanspbependingpdf_2024')->middleware('auth');
Route::get('/laporanspbe/2024/laporanspbeterkirimpdf_2024', [spbe2024Controller::class, 'laporanspbeterkirimpdf_2024'])->name('laporanspbe.2024.laporanspbeterkirimpdf_2024')->middleware('auth');

/**/
Route::post('/bidang_urusan_id', [Aplikasi2021AdmPemerintahController::class, 'getbidangurusan'])->name('bidang_urusan_id.get');

/*instansi*/
Route::get('/instansi/datainstansi', [InstansiController::Class, 'datainstansi'])->name('instansi.datainstansi')->middleware('auth');
Route::get('/instansi/create', [InstansiController::Class, 'create'])->name('instansi.create')->middleware('auth');
Route::post('/instansi/store', [InstansiController::Class, 'store'])->name('instansi.store')->middleware('auth');
Route::get('/instansi/{instansi}/edit', [InstansiController::Class, 'edit'])->name('instansi.edit')->middleware('auth');
Route::patch('/instansi/{instansi}/edit', [InstansiController::Class, 'update'])->name('instansi.edit')->middleware('auth');
Route::delete('/instansi/{instansi}/delete', [InstansiController::Class, 'destroy'])->name('instansi.delete')->middleware('auth');

/*tahun*/
Route::get('/superadmin/tahun', [MenuSuperAdminController::class, 'tahun'])->name('superadmin.tahun')->middleware('auth');
Route::get('/tahun/create', [TahunController::class, 'create'])->name('tahun.create')->middleware('auth');
Route::post('/tahun/store', [TahunController::Class, 'store'])->name('tahun.store')->middleware('auth');
Route::get('/tahun/{tahun}/edit', [TahunController::Class, 'edit'])->name('tahun.edit')->middleware('auth');
Route::patch('/tahun/{tahun}/edit', [TahunController::Class, 'update'])->name('tahun.edit')->middleware('auth');
Route::delete('/tahun/{tahun}/delete', [TahunController::Class, 'destroy'])->name('tahun.delete')->middleware('auth');

/*pemberitahuan*/
Route::get('/pemberitahuan/index', [PemberitahuanController::class, 'index'])->name('pemberitahuan.index')->middleware('auth');
Route::get('/pemberitahuan/create', [PemberitahuanController::class, 'create'])->name('pemberitahuan.create')->middleware('auth');
Route::post('/pemberitahuan/store', [PemberitahuanController::class, 'store'])->name('pemberitahuan.store')->middleware('auth');
Route::get('/pemberitahuan/{pemberitahuan}/edit', [PemberitahuanController::class, 'edit'])->name('pemberitahuan.edit')->middleware('auth');
Route::patch('/pemberitahuan/{pemberitahuan}/edit', [PemberitahuanController::class, 'update'])->name('pemberitahuan.edit')->middleware('auth');

Route::get('/menu/updatelayananaplikasi', [MenuController::class, 'updatelayananaplikasi'])->name('menu.updatelayananaplikasi')->middleware('auth');
Route::get('/menu/uploadberkasaps', [MenuController::class, 'uploadberkasaps'])->name('menu.uploadberkasaps')->middleware('auth');





Route::get('/', [LoginController::class, 'login'])->name('login');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'ceklogin'])->name('ceklogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');  