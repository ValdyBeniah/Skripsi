<?php

namespace App\Http\Controllers;

use App\Models\supir;
use Illuminate\Http\Request;

class supircontroller extends Controller
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
            $data = supir::where('name', 'like', "%$katakunci%")
                ->orWhere('nomor', 'like', "%$katakunci%")
                ->orWhere('plat', 'like', "%$katakunci%")
                ->orWhere('jenis', 'like', "%$katakunci%")
                ->orWhere('tahun', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = supir::orderBy('id', 'desc')->paginate($jumlahbaris);
        }
        return view('gudang.gudangsupir')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gudang.tambahsupir');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor' => 'required',
            'plat' => 'required',
            'jenis' => 'required',
            'tahun' => 'required',
        ]);

        $data = [
            'name' => $request->nama,
            'nomor' => $request->nomor,
            'plat' => $request->plat,
            'jenis' => $request->jenis,
            'tahun' => $request->tahun,

        ];
        supir::create($data);
        return redirect()->to('gudangsupir')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function show(supir $supir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = supir::where('id', $id)->first();
        return view('gudang.edit-gudangsupir')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'name'=>$request->nama,
            'nomor'=>$request->nomor,
            'plat'=>$request->plat,
            'jenis'=>$request->jenis,
            'tahun'=>$request->tahun
        ];

        supir::where('id',$id)->update($data);
        return redirect()->to('gudangsupir')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\supir  $supir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        supir::where('id', $id)->delete();
        return redirect()->to('gudangsupir')->with('success', 'Berhasil menghapus data');
    }
}
