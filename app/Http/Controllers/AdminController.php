<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('admin');
    }

    public function admin(Request $request) {
        $jumlahUser = User::all();
        $jumlahData = transaksi::count();
        $jumlahCustomer = Customer::count();
        $jumlahTruk = DB::table('truk')->sum('jumlah');
        $jumlahTransaksi = DB::table('transaksi')->sum('total');
        $pendapatanBulanan = 0;
        $pendapatanTahunan = 0;
        $selectedMonth = $request->input('bulan');
        $selectedYear = $request->input('tahun');

        if ($selectedMonth && $selectedYear) {
            $pendapatanBulanan = transaksi::whereYear('date', $selectedYear)
                ->whereMonth('date', $selectedMonth)
                ->sum('total');
        }

        if ($selectedYear) {
            $pendapatanTahunan = transaksi::whereYear('date', $selectedYear)
                ->sum('total');
        }

        // Data untuk grafik
        $transactions = transaksi::select(
            DB::raw('YEAR(date) as year'),
            DB::raw('COUNT(*) as count'),
            DB::raw('SUM(total) as total')
        )
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

    public function gudang() {
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

    public function supir() {
        return view('supir.supir');
    }
}
