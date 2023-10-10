<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Merek;

class MerekController extends Controller
{
    public function detail($kode)
    {
        // return "hellow word";
        $merek = Merek::where('kode_merek', $kode)->first();
        return view('admin/merek.qrcode_detail', compact('merek'));
    }
}