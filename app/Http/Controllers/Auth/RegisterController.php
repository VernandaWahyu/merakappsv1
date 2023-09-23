<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function register(){
        return view("auth/register");
    }
    function create(Request $request)
    {
        Session::flash('name',$request->name);
        Session::flash('email',$request->email);
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ],[
            'name.required'=>'Nama Wajib Diisi',
            'email.required'=>'Email Wajib Diisi',
            'email.email'=>'Silahkan Masukkan Email Yang Valid',
            'email.unique'=>'Email Sudah Pernah Digunakan',
            'password.required'=>'Password Wajib Diisi',
            'password.min'=>'Password Minimal 6 Karakter'
        ]);
        $data =[
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        User::create($data);
        $infologin=[
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if(Auth::attempt($infologin)){
            return redirect('/dashboard')->with('success',Auth::user()->name. 'Berhasil Login');
        }
    }
}
