<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahUser = User::all();
        $jumlahData = transaksi::where('is_hidden', 0)->count();
        $jumlahCustomer = Customer::count();
        $jumlahTruk = DB::table('truk')->sum('jumlah');
        $jumlahTransaksi = transaksi::where('is_hidden', 0)->sum('total');

        $pendapatanBulanan = 0;
        $pendapatanTahunan = 0;
        $selectedMonth = $request->input('bulan');
        $selectedYear = $request->input('tahun');

        if ($selectedMonth && $selectedYear) {
            $pendapatanBulanan = transaksi::where('is_hidden', 0)
                ->whereYear('date', $selectedYear)
                ->whereMonth('date', $selectedMonth)
                ->sum('total');
        }

        if ($selectedYear) {
            $pendapatanTahunan = transaksi::where('is_hidden', 0)
                ->whereYear('date', $selectedYear)
                ->sum('total');
        }

        // Data untuk grafik
        $transactions = transaksi::select(
            DB::raw('YEAR(date) as year'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(total) as total')
        )
        ->where('is_hidden', 0)
        ->groupBy('year')
        ->get();

        $years = [];
        $transactionCounts = [];
        $transactionTotals = [];

        foreach ($transactions as $transaction) {
            $years[] = $transaction->year;
            $transactionCounts[] = $transaction->count;
            $transactionTotals[] = $transaction->total;
        }

        return view('admin.admindashboard', [
            'jumlahData' => $jumlahData,
            'jumlahCustomer' => $jumlahCustomer,
            'jumlahTruk' => $jumlahTruk,
            'jumlahTransaksi' => $jumlahTransaksi,
            'jumlahUser' => $jumlahUser,
            'pendapatanBulanan' => $pendapatanBulanan,
            'pendapatanTahunan' => $pendapatanTahunan,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
            'years' => $years,
            'transactionCounts' => $transactionCounts,
            'transactionTotals' => $transactionTotals
        ]);
    }
}
