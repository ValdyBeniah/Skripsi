<?php

namespace App\Http\Controllers;

use App\Models\suratjalan;
use App\Models\transaksi;
use Mpdf\Mpdf;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratJalanController extends Controller
{
    public function index()
    {
        // Fetch the transaction data from the database
        $transactions = transaksi::all(); // Or use a different query to get the specific transaction
        $uniqueCode = uniqid();

        // Return the view with the transactions data
        return view('admin.admin-suratjalan', compact('transactions', 'uniqueCode'));
    }

    /////
    public function indeks($id)
    {
        // Fetch the specific transaction data from the database
        $transaction = transaksi::findOrFail($id); // Gunakan findOrFail untuk menghandle transaksi yang tidak ditemukan
        $uniqueCode = uniqid();

        // Return the view with the transaction data
        return view('admin.admin-lihatsuratjalan', compact('transaction', 'uniqueCode'));
    }
    /////

    public function save(Request $request)
    {
        $suratJalan = new suratjalan();
        $suratJalan->kode = $request->kode;
        $suratJalan->name = $request->name;
        $suratJalan->date = $request->date;
        $suratJalan->pickup_address = $request->pickup_address;
        $suratJalan->destination_address = $request->destination_address;
        $suratJalan->barang = $request->barang;
        $suratJalan->jenis = $request->jenis;
        $suratJalan->truk = $request->truk;
        $suratJalan->weight = $request->weight;
        $suratJalan->phone = $request->phone;
        $suratJalan->total = $request->total;

        $suratJalan->save();
        // return redirect()->back()->with('success', 'Data telah berhasil disimpan ke dalam database.');
        return redirect()->route('admintransaksi')->with('success', 'Data telah berhasil disimpan ke dalam database.');
    }

    public function view_pdf($id)
    {
        // Fetch the transaction data for the specific ID
        // $transaction = transaksi::findOrFail($id);

        // $mpdf = new \Mpdf\Mpdf();
        // ob_start();
        // $html = view('admin.admin-suratjalan', compact('transaction'))->render();
        // ob_end_clean();

        // $mpdf->WriteHTML($html);
        // $mpdf->Output();
        /////
        // $mpdf = new \Mpdf\Mpdf();
        // $transactions = transaksi::where('id', $id)->get();
        // $html = view('admin.admin-suratjalan', compact('transactions', 'id'))->render();
        // $mpdf->WriteHTML($html);
        // $mpdf->Output("Surat Jalan.pdf", 'I');
        // Retrieve the transaction by ID
        $transaction = transaksi::where('id', $id)->firstOrFail();
        $mpdf = new \Mpdf\Mpdf;

        // Generate a unique random code
        $uniqueCode = uniqid();

        // Render view to HTML, pass the unique code to the view
        $html = view('admin.admin-suratjalan', compact('transaction', 'uniqueCode'))->render();

        // Write HTML to PDF
        $mpdf->WriteHTML($html);

        // Construct the PDF filename
        $pickupDateFormatted = (new DateTime($transaction->date))->format('Y-m-d');
        $customerName = str_replace([' ', '/'], '_', $transaction->name);
        $fileName = "Surat_Jalan_{$customerName}_{$pickupDateFormatted}.pdf";

        // Output PDF with dynamic filename
        $mpdf->Output($fileName, 'I');
    }

    // SuratJalanController.php

    public function simpan(Request $request)
    {
        // Validasi request atau langsung simpan data
        $suratJalan = new suratjalan(); // Ganti dengan model yang sesuai
        $suratJalan->kode = $request->kode;
        // Set property lainnya dari $suratJalan dengan data dari $request
        $suratJalan->save();

        // URL untuk PDF (misal menggunakan route 'view_pdf' yang sudah Anda buat)
        $urlPdf = route('view_pdf', $suratJalan->id);

        return response()->json(['urlPdf' => $urlPdf]);
    }
}
