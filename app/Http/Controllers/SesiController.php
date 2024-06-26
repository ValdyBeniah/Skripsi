<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($infologin)){
            if(Auth::user()->role == 'admin') {
                return redirect('admin/admin');
            } elseif (Auth::user()->role == 'gudang'){
                return redirect('admin/gudang');
            } else if (Auth::user()->role == 'supir'){
                return redirect('admin/supir');
            }
            // return redirect('admin');
        } else {
            return redirect('')->withErrors('Username dan password salah!')->withInput();
        }
    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
