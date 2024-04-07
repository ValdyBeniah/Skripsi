<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    function index() {
        return view('admin');
    }

    public function admin() {
        $jumlahData = transaksi::count();
        $jumlahCustomer = Customer::count();
        $jumlahTruk = DB::table('truk')->sum('jumlah');
        return view('admin.admindashboard',
        ['jumlahData' => $jumlahData, 'jumlahCustomer' => $jumlahCustomer, 'jumlahTruk' => $jumlahTruk]);
    }

    public function gudang() {
        // echo "ini gudang";
        // echo "<h1> Selamat datang " . Auth::user()->name . "</h1>";
        // echo "<a href='/logout'>Logout</a>";
        return view('gudang.gudangdashboard');
    }
}
