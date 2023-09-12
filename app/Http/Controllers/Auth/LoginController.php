<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    function auth(){
        return view("auth/login");
    }
    function login(Request $request)
    {
        Session::flash('email',$request->email);
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib Diisi',
            'password.required'=>'Password Wajib Diisi'
        ]);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)){
            return redirect('/dashboard')->with('success','Berhasil Login');
        }else{
            return redirect('auth')->with('gagal','Username Atau Password Yang Anda Masukkan Tidak Valid');
        }
    }
    function logout(){
        Auth::logout();
        return redirect('auth')->with('success','Berhasil Logout');
    }
}
