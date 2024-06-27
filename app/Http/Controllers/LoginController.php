<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller {
    public function login(){
        return view('login'); // untuk login
    }

    public function ceklogin(Request $request){
        $login = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (\Auth::attempt($login)) {
            session(['username' => $request->username]);
            $user = \App\Models\User::where('username', session()->get('username'))->first();
            if ($user->level == 'Pengguna') {
                return redirect('/menu/index');
            }else if ($user->level == 'Super Admin') {
                return redirect('/superadmin/menu');
            }
        }else{
            return redirect('/login')->with('wrong', 'Username atau Password Salah');
        }
    }

    public function logout(){
        session()->forget('username');
        return redirect(route('login'));
    }
    
}
