<?php

namespace App\Http\Controllers;

use App\Models\bukti;
use App\Models\transaksi;
use Illuminate\Http\Request;

class SupirTransaksi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $katakunci = $request->katakunci; // Mengambil kata kunci dari request
        // $jumlahbaris = 5; // Jumlah baris per halaman untuk pagination

        // // Inisialisasi query dengan urutan berdasarkan tanggal
        // if(strlen($katakunci)){
        //     $data = transaksi::where('name','like',"%$katakunci%")
        //             ->orWhere('phone','like',"%$katakunci%")
        //             ->orWhere('pickup_address','like',"%$katakunci%")
        //             ->orWhere('destination_address','like',"%$katakunci%")
        //             ->with('bukti')
        //             ->paginate($jumlahbaris);
        // }else{
        //     $data = transaksi::orderBy('id','desc')
        //             ->with('bukti')
        //             ->paginate($jumlahbaris);
        // }
        // return view('supir.supirtransaksi')->with('data', $data);

        $katakunci = $request->katakunci; // Mengambil kata kunci dari request
        $jumlahbaris = 5; // Jumlah baris per halaman untuk pagination

        // Inisialisasi query dengan urutan berdasarkan tanggal
        if(strlen($katakunci)){
            $data = Transaksi::with('bukti')
                    ->where('name','like',"%$katakunci%")
                    ->orWhere('phone','like',"%$katakunci%")
                    ->orWhere('pickup_address','like',"%$katakunci%")
                    ->orWhere('destination_address','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = Transaksi::with('bukti')->orderBy('id','desc')->paginate($jumlahbaris);
        }
        return view('supir.supirtransaksi')->with('data', $data);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required|string|max:255',
            'transaksi_id' => 'required|exists:transaksi,id'
        ]);

        $transaksi = Transaksi::find($request->transaksi_id);

        if ($request->hasFile('file')) {
            $fileName = time() . '.' . $request->file->extension();
            $filePath = $request->file->storeAs('uploads', $fileName, 'public');
            
            Bukti::create([
                'transaksi_id' => $transaksi->id,
                'gambar' => $filePath,
                'keterangan' => $request->keterangan
            ]);
        }

        return redirect()->back()->with('success', 'Image uploaded successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function show(bukti $bukti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function edit(bukti $bukti)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bukti $bukti)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bukti  $bukti
     * @return \Illuminate\Http\Response
     */
    public function destroy(bukti $bukti)
    {
        //
    }
}
