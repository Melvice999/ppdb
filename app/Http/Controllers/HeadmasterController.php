<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HeadmasterController extends Controller
{
    public function index() {
        return view('headmaster.headmaster-beranda');
    }

    public function cetakFormulirSekarang()  {
        return view('headmaster.cetak.formulir-sekarang');
    }
    public function cetakFormulirTahun()  {
        return view('headmaster.cetak.formulir-tahun');
    }
    public function cetakRekapPpdb()  {
        return view('headmaster.cetak.rekap.cetak-rekap-ppdb');
    }
}
