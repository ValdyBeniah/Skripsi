<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Mpdf\Mpdf;
use DateTime;


class SuratJalanController extends Controller
{
    public function index() {
        // Fetch the transaction data from the database
        $transactions = transaksi::all(); // Or use a different query to get the specific transaction

        // Return the view with the transactions data
        return view('admin.admin-suratjalan', compact('transactions'));
    }

    public function view_pdf($id) {
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

        // Initialize mPDF
        $mpdf = new \Mpdf\Mpdf;
    
        // Render view to HTML
        $html = view('admin.admin-suratjalan', compact('transaction'))->render();
    
        // Write HTML to PDF
        $mpdf->WriteHTML($html);
    
        // Construct the PDF filename
        $pickupDateFormatted = (new DateTime($transaction->date))->format('Y-m-d');
        $customerName = str_replace([' ', '/'], '_', $transaction->name);
        $fileName = "Surat_Jalan_{$customerName}_{$pickupDateFormatted}.pdf";
    
        // Output PDF with dynamic filename
        $mpdf->Output($fileName, 'I');
    }
    
    // public function download_pdf($id) {
    //     $transaction = transaksi::findOrFail($id);
        
    //     $mpdf = new \Mpdf\Mpdf();
    //     ob_start();
    //     $html = view('admin.admin-suratjalan', compact('transaction'))->render();
    //     ob_end_clean();
    
    //     $mpdf->WriteHTML($html);
    //     $mpdf->Output('transaksi-'.$id.'.pdf', 'D');
    // }
    
}
