<?php

namespace App\Http\Controllers;

use App\Models\gudangbarang;
use App\Models\truk;
use Illuminate\Http\Request;

class GudangBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = truk::all();
        return view('gudang.gudangbarang')
                    ->with('data', $data);
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
     * @param  \App\Models\gudangbarang  $gudangbarang
     * @return \Illuminate\Http\Response
     */
    public function show(gudangbarang $gudangbarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gudangbarang  $gudangbarang
     * @return \Illuminate\Http\Response
     */
    public function edit(gudangbarang $gudangbarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\gudangbarang  $gudangbarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, gudangbarang $gudangbarang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gudangbarang  $gudangbarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(gudangbarang $gudangbarang)
    {
        //
    }
}
