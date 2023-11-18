<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('/pages/login');
    }
    
    function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ],[
            'email.required'=>'Email Wajib diisi',
            'password.required'=>'Password Wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password'=> $request->password,
        ];

        if(Auth::attempt($infologin)){
           if(Auth::user()->role == 'Project Manager'){
            return redirect('admin/projectmanager');
           }elseif (Auth::user()->role == 'Employee'){
            return redirect('admin/employee');
           }elseif (Auth::user()->role == 'Marketing'){
            return redirect('admin/marketing');
           }
           
        }else{
                return redirect('')->withErrors('Email atau Password tidak Sesuai !!!')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
