<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index() {
        return view('admin');
    }

    function admin() {
        // echo "ini admin";
        // echo "<h1> Selamat datang " . Auth::user()->name . "</h1>";
        // echo "<a href='/logout'>Logout</a>";
        return view('admin.admindashboard');
    }

    function gudang() {
        // echo "ini gudang";
        // echo "<h1> Selamat datang " . Auth::user()->name . "</h1>";
        // echo "<a href='/logout'>Logout</a>";
        return view('gudang.gudangdashboard');
    }
}
