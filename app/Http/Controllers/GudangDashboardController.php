<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GudangDashboardController extends Controller
{
    public function index()
    {
        $jumlahTruk = DB::table('truk')->sum('jumlah');
        $onProgressCount = DB::table('transaksi')->where('tracking', 'on progress')->count();
        $deliveryByDriverCount = DB::table('transaksi')->where('tracking', 'delivery by driver')->count();
        $completeCount = DB::table('transaksi')->where('tracking', 'complete')->count();

        return view('gudang.gudangdashboard', [
            'jumlahTruk' => $jumlahTruk,
            'onProgressCount' => $onProgressCount,
            'deliveryByDriverCount' => $deliveryByDriverCount,
            'completeCount' => $completeCount
        ]);
    }
}
