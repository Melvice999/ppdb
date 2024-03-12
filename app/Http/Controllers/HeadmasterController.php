<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadmasterController extends Controller
{
    public function index() {
        return view('headmaster.headmaster-beranda');
    }

    public function cetakBerkas()  {
        return view('headmaster.headmaster-cetak-berkas');
    }
}
