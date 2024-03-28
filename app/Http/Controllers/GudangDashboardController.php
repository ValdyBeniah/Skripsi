<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GudangDashboardController extends Controller
{
    public function index()
    {
        return view('gudang.gudangdashboard');
    }
}
