<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
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
        if(strlen($katakunci)){
            $data = customer::where('name','like',"%$katakunci%")
                    ->orWhere('phone','like',"%$katakunci%")
                    ->orWhere('pickup_address','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        }else{
            $data = customer::orderBy('id','desc')->paginate($jumlahbaris);
        }
        return view('admin.admincustomer')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-admincustomer');
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
        Session::flash('pickup_address', $request->pickup);
        Session::flash('phone', $request->telp);

        $request->validate([
            'nama' => 'required',
            'pickup' => 'required',
            'telp' => 'required',
        ]);
        $data = [
            'name'=>$request->nama,
            'pickup_address'=>$request->pickup,
            'phone'=>$request->telp,
        ];
        customer::create($data);
        return redirect()->to('admincustomer')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($customer)
    {
        $data = customer::where('id',$customer)->first();
        return view('admin.edit-admincustomer')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $customer)
    {
        $request->validate([
            'nama' => 'required',
            'pickup' => 'required',
            'telp' => 'required',
        ]);
        $data = [
            'name'=>$request->nama,
            'pickup_address'=>$request->pickup,
            'phone'=>$request->telp,
        ];
        customer::where('id',$customer)->update($data);
        return redirect()->to('admincustomer')->with('success', 'Berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($customer)
    {
        customer::where('id', $customer)->delete();
        return redirect()->to('admincustomer')->with('success', 'Berhasil menghapus data');
    }
}
