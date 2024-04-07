<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $jumlahData = transaksi::count();
        $jumlahCustomer = Customer::count();
        $jumlahTruk = DB::table('truk')->sum('jumlah');
        return view('admin.admindashboard',
        ['jumlahData' => $jumlahData, 'jumlahCustomer' => $jumlahCustomer, 'jumlahTruk' => $jumlahTruk]);
    }
}
