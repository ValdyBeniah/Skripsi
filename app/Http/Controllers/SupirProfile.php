<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupirProfile extends Controller
{
    public function index() {
        return view('supir.supirprofile');
    }
}
