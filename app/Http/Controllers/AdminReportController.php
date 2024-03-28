<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index()
    {
        $reports = transaksi::selectRaw('date, COUNT(*) as jumlah_transaksi, SUM(total) as total_transaksi')
                         ->groupBy('date')
                         ->get();
        return view('admin.adminreport', compact('reports'));
    }

    public function showDetail($date)
    {
        $transaksiDetail = transaksi::whereDate('date', $date)->get();
        return view('admin.adminreport_detail', compact('transaksiDetail', 'date'));
    }
}
