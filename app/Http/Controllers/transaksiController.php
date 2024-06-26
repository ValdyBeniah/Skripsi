<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\jenis;
use App\Models\supir;
use App\Models\suratjalan;
use App\Models\truk;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if (strlen($katakunci)) {
            $data = transaksi::where('name', 'like', "%$katakunci%")
                ->orWhere('phone', 'like', "%$katakunci%")
                ->orWhere('pickup_address', 'like', "%$katakunci%")
                ->orWhere('destination_address', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = transaksi::orderBy('id', 'desc')->paginate($jumlahbaris);
        }

        // $kode = suratjalan::all();
        return view('admin.admintransaksi')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datas = Customer::all();
        $jenisData = jenis::all();
        $supir = supir::all();
        $usedSupirNames = transaksi::where('is_completed', false)->pluck('supir')->toArray();
        return view('admin.create-admintransaksi', compact('datas', 'jenisData', 'supir', 'usedSupirNames'));
    }

    // public function hide($id)
    // {
    //     $transaksi = transaksi::findOrFail($id);
    //     $transaksi->is_hidden = true;
    //     $transaksi->save();

    //     return response()->json(['success' => 'Transaksi berhasil di-hide']);
    // }

    public function hide($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->is_hidden = 1;
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil disembunyikan.');
    }

    public function unhide($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->is_hidden = 0;
        $transaksi->save();

        return redirect()->back()->with('success', 'Transaksi berhasil ditampilkan kembali.');
    }

    public function getPickupAddress($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer->pickup_address);
    }

    public function getPlat($id)
    {
        $supir = supir::findOrFail($id);
        return response()->json($supir->plat);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::debug('Total received:', ['total' => $request->input('total')]);

        Session::flash('name', $request->nama);
        Session::flash('date', $request->tanggal);
        Session::flash('pickup_address', $request->pickup);
        Session::flash('destination_address', $request->tujuan);
        Session::flash('barang', $request->barang);
        Session::flash('jenis', $request->jenis);
        Session::flash('truk', $request->truk);
        Session::flash('supir', $request->supir);
        Session::flash('plat', $request->plat);
        Session::flash('weight', $request->berat);
        Session::flash('phone', $request->telp);
        Session::flash('total', $request->total);
        $request->merge(['track' => $request->track ?? 'New Transaction']);
        Session::flash('tracking', $request->track);

        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'pickup' => 'required',
            'tujuan' => 'required',
            'barang' => 'required',
            'jenis' => 'required',
            'truk' => 'required',
            'supir' => 'required',
            'plat' => 'required',
            'berat' => 'required',
            'telp' => 'required',
            'total' => 'required|numeric',
            'track' => 'required',
        ]);

        $requestedTrucks = (int) $request->truk;

        // Retrieve the truck record from the database.
        $truckRecord = truk::first();

        //Mengambil data jumlah truk lalu mengecek dengan jumlah yang diinput apakah terlalu banyak
        //jika kebanyakan maka akan muncul alert jumlah truk tidak cukup
        $availableTrucks = truk::sum('jumlah');
        $requestedTrucks = intval($request->truk);

        if ($requestedTrucks > $availableTrucks) {
            // Kembalikan ke halaman sebelumnya dengan pesan kesalahan
            return back()->withErrors(['truk' => 'Jumlah truk yang diminta terlalu banyak, tidak cukup truk yang tersedia.'])->withInput();
        }

        // Check if there are enough trucks available.
        if ($truckRecord && $truckRecord->jumlah >= $requestedTrucks) {
            // Subtract the number of requested trucks from the current amount.
            $truckRecord->jumlah -= $requestedTrucks;

            // Save the updated truck record.
            $truckRecord->save();

            // Now, you can proceed to create the transaction record with the total cost.
            // ... Your code to create the transaction record ...

        } else {
            // Handle the error scenario where there are not enough trucks.
            return back()->withError('There are not enough trucks available.')->withInput();
        }

        $customer = Customer::findOrFail($request->nama);

        // Mendapatkan harga berdasarkan jenis
        $jenis = jenis::where('jenis', $request->jenis)->first();
        // Kalkulasi biaya berdasarkan berat dan jenis
        $biayaJenis = $request->berat * $jenis->harga;

        // Mendapatkan harga truk
        $truk = truk::where('truk', $request->truk)->first();
        // Kalkulasi biaya truk
        $biayaTruk = $truk ? $truk->harga : 0; // Jika truk tidak ditemukan, gunakan harga 0

        // Total biaya
        $totalBiaya = $biayaJenis + $biayaTruk;

        $totalBiaya = (float) $request->input('total');

        $data = [
            // 'name'=>$request->nama,
            'id_transaksi' => uniqid(),
            'name' => $customer->name,
            'date' => $request->tanggal,
            'pickup_address' => $request->pickup,
            'destination_address' => $request->tujuan,
            'barang' => $request->barang,
            'jenis' => $request->jenis,
            'truk' => $request->truk,
            'supir' => $request->supir,
            'plat' => $request->plat,
            'weight' => $request->berat,
            'phone' => $request->telp,
            // 'total'=>$request->total,
            'total' => $totalBiaya,
            'tracking' => $request->track
        ];
        transaksi::create($data);
        return redirect()->to('admintransaksi')->with('success', 'Berhasil menambahkan data');
    }

    public function complete($id)
    {
        $transaction = transaksi::findOrFail($id);
        $truckCount = $transaction->truk;

        $transaction->is_completed = true; // Asumsi Anda memiliki kolom `is_completed` di database
        $transaction->save();
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

            return redirect()->to('admintransaksi')->with('success', 'Truck count has been updated.');
        } else {
            return back()->withError('Truck record not found.')->withInput();
        }
    }

    public function completed($id)
    {
        $completed = transaksi::findOrFail($id);

        if ($completed->is_completed) {
            return back()->withError('This transaction is already marked as complete.');
        }

        // ... rest of the completion logic ...

        // Mark the transaction as complete
        $completed->is_completed = true;
        $completed->save();

        return redirect()->to('admintransaksi')->with('success', 'Truck count has been updated and transaction marked as complete.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Customer::all();
        $jenisData = jenis::all();
        $data = transaksi::where('id', $id)->first();
        $supir = supir::all();
        $usedSupirIds = transaksi::where('is_completed', false)->pluck('supir')->toArray();
        // $data = transaksi::findOrFail($id);
        return view('admin.edit-admintransaksi')
            ->with('data', $data)
            ->with('datas', $datas)
            ->with('jenisData', $jenisData)
            ->with('supir', $supir)
            ->with('usedSupirIds', $usedSupirIds);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'pickup' => 'required',
            'tujuan' => 'required',
            'barang' => 'required',
            'jenis' => 'required',
            'supir' => 'required',
            'plat' => 'required',
            'truk' => 'required',
            'berat' => 'required',
            'telp' => 'required',
            'total' => 'required|numeric',
            // 'track' => 'required',
        ]);

        $customer = Customer::findOrFail($request->nama);

        // Mendapatkan harga berdasarkan jenis
        $jenis = Jenis::where('jenis', $request->jenis)->first();
        // Kalkulasi biaya berdasarkan berat dan jenis
        $biayaJenis = $request->berat * $jenis->harga;

        // Mendapatkan harga truk
        $truk = Truk::where('truk', $request->truk)->first();
        // Kalkulasi biaya truk
        $biayaTruk = $truk ? $truk->harga : 0; // Jika truk tidak ditemukan, gunakan harga 0

        // Total biaya
        $totalBiaya = $biayaJenis + $biayaTruk;

        $totalBiaya = (float) $request->input('total');

        $data = [
            // 'id_transaksi' => $request->id_transaksi,
            'name' => $customer->name,
            // 'name'=>$request->nama,
            'date' => $request->tanggal,
            'pickup_address' => $request->pickup,
            'destination_address' => $request->tujuan,
            'barang' => $request->barang,
            'jenis' => $request->jenis,
            'truk' => $request->truk,
            'supir' => $request->supir,
            'plat' => $request->plat,
            'weight' => $request->berat,
            'phone' => $request->telp,
            // 'total'=>$request->total,
            'total' => $totalBiaya,
            // 'tracking'=>$request->track
        ];
        // $datas = Customer::all();
        // $jenisData = jenis::all();
        transaksi::where('id', $id)->update($data);
        return redirect()->to('admintransaksi')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        transaksi::where('id', $id)->delete();
        return redirect()->to('admintransaksi')->with('success', 'Berhasil menghapus data');
    }
}
