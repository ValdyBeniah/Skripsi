<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangProfileController extends Controller
{
    public function index()
    {
        return view('gudang.gudangprofile');
    }
}
