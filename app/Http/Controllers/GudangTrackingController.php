<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use App\Models\gudangtracking;
use App\Models\truk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GudangTrackingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci; // Mengambil kata kunci dari request
        $jumlahbaris = 5; // Jumlah baris per halaman untuk pagination

        // Inisialisasi query dengan urutan berdasarkan tanggal
        $query = transaksi::orderBy('id', 'desc');

        // Jika kata kunci disediakan, tambahkan kondisi where
        if(strlen($katakunci)) {
            $query = $query->where(function($q) use ($katakunci) {
                        $q->where('name', 'like', "%$katakunci%")
                        ->orWhere('phone', 'like', "%$katakunci%")
                        ->orWhere('pickup_address', 'like', "%$katakunci%")
                        ->orWhere('destination_address', 'like', "%$katakunci%");
                    });
        } else {
            $data = $query->paginate($jumlahbaris);
        }
        return view('gudang.gudangtracking', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $dataa = transaksi::all();
        // return view('gudang.gudangtracking', compact('dataa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('name', $request->nama);
        Session::flash('date', $request->tanggal);
        Session::flash('pickup_address', $request->pickup);
        Session::flash('destination_address', $request->tujuan);
        Session::flash('weight', $request->berat);
        Session::flash('phone', $request->telp);
        Session::flash('total', $request->total);
        Session::flash('tracking', $request->track);

        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'pickup' => 'required',
            'tujuan' => 'required',
            'berat' => 'required',
            'telp' => 'required',
            'total' => 'required',
            'track' => 'required',
        ]);
        $data = [
            'name'=>$request->nama,
            'date'=>$request->tanggal,
            'pickup_address'=>$request->pickup,
            'destination_address'=>$request->tujuan,
            'weight'=>$request->berat,
            'phone'=>$request->telp,
            'total'=>$request->total,
            'tracking'=>$request->track
        ];
        transaksi::create($data);
        return redirect()->to('gudangtracking')->with('success', 'Berhasil menambahkan data');
    }

    public function complete($id)
    {
        $transaction = transaksi::findOrFail($id);
        $truckCount = $transaction->truk;

        $transaction->is_completed = true; // Asumsi Anda memiliki kolom `is_completed` di database
        $transaction->save();

        //Mengubah status menjadi finish jika button selesai ditekan
        $transaction->update(['tracking' => 'finish']);

        // Retrieve the truck record from the database.
        $truckRecord = truk::first();
        if ($truckRecord) {
            // Increase the number of trucks by the amount used in the transaction.
            $truckRecord->jumlah += $truckCount;
            // Save the updated truck record.
            $truckRecord->save();

            // Optionally, you can also mark the transaction as completed in some way
            // e.g., $transaction->status = 'completed';
            // $transaction->save();

            return redirect()->to('gudangtracking')->with('success', 'Truck count has been updated.');
        } else {
            return back()->withError('Truck record not found.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gudangtracking  $gudangtracking
     * @return \Illuminate\Http\Response
     */
    public function show(gudangtracking $gudangtracking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  \App\Models\gudangtracking  $gudangtracking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = transaksi::where('id',$id)->first();
        return view('gudang.edit-gudangtracking')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\gudangtracking  $gudangtracking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'nama' => 'required',
            // 'tanggal' => 'required',
            // 'pickup' => 'required',
            // 'tujuan' => 'required',
            // 'berat' => 'required',
            // 'telp' => 'required',
            // 'total' => 'required',
            'track' => 'required',
        ]);
        $data = [
            // 'name'=>$request->nama,
            // 'date'=>$request->tanggal,
            // 'pickup_address'=>$request->pickup,
            // 'destination_address'=>$request->tujuan,
            // 'weight'=>$request->berat,
            // 'phone'=>$request->telp,
            // 'total'=>$request->total,
            'tracking'=>$request->track
        ];
        transaksi::where('id',$id)->update($data);
        return redirect()->to('gudangtracking')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gudangtracking  $gudangtracking
     * @return \Illuminate\Http\Response
     */
    public function destroy(gudangtracking $gudangtracking)
    {
        //
    }
}
