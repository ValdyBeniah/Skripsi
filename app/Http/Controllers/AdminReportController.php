<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $query = transaksi::selectRaw('date, COUNT(*) as jumlah_transaksi, SUM(total) as total_transaksi')
                        ->groupBy('date');

        if ($request->has('katakunci')) {
            $katakunci = $request->get('katakunci');
            $query->where('date', 'like', "%{$katakunci}%");
        }

        $reports = $query->get();

        return view('admin.adminreport', compact('reports'));
    }

    public function showDetail($date)
    {
        $transaksiDetail = transaksi::whereDate('date', $date)->get();
        return view('admin.adminreport_detail', compact('transaksiDetail', 'date'));
    }
}
