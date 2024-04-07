<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
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
        return view('gudang.gudangdashboard');
    }
}
