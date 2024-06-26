<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index($instansi_id){
        $instansi_id = request('instansi_id');
        $user = Pengguna::where('instansi_id', $instansi_id)->where('level', 'Pengguna')->get();
        return view('pengguna.index', ['instansi_id' => $instansi_id, 'user' => $user]);
    }

    public function addpengguna(){
        /*$instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;*/
        /*$instansi = Instansi::orderBy('nama_instansi', 'asc')->get();*/
        $instansi_id = request('instansi_id');
        $user = Pengguna::where('instansi_id', $instansi_id)->where('level', 'Pengguna')->first();
        return view('pengguna.addpengguna', ['instansi_id' => $instansi_id, 'user' => $user]);
    }

    public function simpanpengguna(Request $request){
            \App\Models\Pengguna::create([
                'id' => \Str::random(8),
                'instansi_id' => $request->instansi_id,
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'username' => $request->username,
                'password' => \Hash::make($request->password),
                'level' => 'Pengguna',
            ]);
       
        return redirect('pengguna/index/'.$request->instansi_id)->with('success', 'Berhasil Menambah Data!');
    }

    public function editdata(Pengguna $user){
        $instansi = Instansi::orderBy('nama_instansi', 'asc')->get();
        return view('pengguna.editdata', ['user' => $user, 'instansi' => $instansi]);
    }

    public function updatedata(Request $request, Pengguna $user){
             $user->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);
       
         return redirect('pengguna/index/'.$user->instansi_id)->with('update', 'Berhasil Menambah Data!');
    }

    public function destroy(Request $request, Pengguna $user){
            $user::destroy($user->id);
        /*return redirect('info/index')->with(['flashdata' => 'Berhasil']);*/
       return redirect('pengguna/index')->with('delete', 'Berhasil Menghapus Data!');
    }

    public function editpassword(Pengguna $user){
        return view('pengguna.editpassword', ['user' => $user]);
    }

    public function updatepassword(Request $request, Pengguna $user){
             $user->update([
                'password' => \Hash::make($request->password),
            ]);
       
        return redirect('pengguna/index/'.$user->instansi_id)->with('update', 'Berhasil Mengubah Data!');
    }


    public function admin(Request $request){
        $user = Pengguna::Where('level', 'Super Admin')->first();
        return view('pengguna.admin', ['user' => $user]);
    }

    public function editadmin(Pengguna $user){
        return view('pengguna.editadmin', ['user' => $user]);
    }

    public function updateadmin(Request $request, Pengguna $user){
             $user->update([
                'nama' => $request->nama,
            ]);
       
        return redirect('pengguna/admin')->with('update', 'Berhasil Mengubah Data!');
    }

    public function editpasswordadmin(Pengguna $user){
        return view('pengguna.editpasswordadmin', ['user' => $user]);
    }

    /*public function updatepasswordadmin(Request $request, Pengguna $user){
             $user->update([
                'password' => \Hash::make($request->password),
            ]);
       
        return redirect('pengguna/admin')->with('update', 'Berhasil Mengubah Data!');
    }*/

    public function updatepasswordadmin(Request $request, Pengguna $user){

        //validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //memeriksa password lama
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        //Hash Password Baru
        $newPassword = Hash::make($request->new_password);

        //simpan pass baru kedalam database
        $user = Auth::user();
        $user->password = $newPassword;
        $user->save();

        return redirect('pengguna/admin')->with('update', 'Berhasil Ubah Data!');
    }


    public function datapengguna(){
        $instansi_id = \App\Models\User::where('username', session('username'))->first()->instansi_id;
        $nama_instansi = Instansi::where('id', $instansi_id)->first()->nama_instansi;
        $pengguna = Pengguna::Where('username', session('username'))->get();
        return view('pengguna.datapengguna', ['pengguna' => $pengguna], ['nama_instansi' => $nama_instansi]);
    }

    public function editpengguna(Pengguna $pengguna){
        return view('pengguna.editpengguna', ['pengguna' => $pengguna]);
    }

    /*public function updatepengguna(Request $request, Pengguna $pengguna){
        $validated = $request->validate([
             'nama' => 'required',
        ]);
        Pengguna::Where('username', session()->get('username'))->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
        ]);
        return redirect('pengguna/datapengguna')->with('update', 'Berhasil Ubah Data!');
    }*/

    public function updatepengguna(Request $request, Pengguna $ppp){
        $ppp->update([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
            ]);
        return redirect('pengguna/datapengguna')->with('update', 'Berhasil Ubah Data!');
    }

    public function editpasspengguna(Pengguna $pengguna){
        return view('pengguna.editpasspengguna', ['pengguna' => $pengguna]);
    }

    /*public function updatepasspengguna(Request $request, Pengguna $pengguna){
        $pengguna->update([
                'password' => \Hash::make($request->password),
            ]);
       
        return redirect('pengguna/datapengguna')->with('update', 'Berhasil Ubah Data!');
    }*/

    public function updatepasspengguna(Request $request, Pengguna $ppp){

        //validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        //memeriksa password lama
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            
            return back()->withErrors(['current_password' => 'Current password is incorrect']);
        }

        //Hash Password Baru
        $newPassword = Hash::make($request->new_password);

        //simpan pass baru kedalam database
        $user = Auth::user();
        $user->password = $newPassword;
        $user->save();

        return redirect('pengguna/datapengguna')->with('update', 'Berhasil Ubah Data!');
    }

    



}
