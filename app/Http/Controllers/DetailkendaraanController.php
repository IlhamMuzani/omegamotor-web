<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Divisi;
use App\Models\Golongan;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Models\Jenis_kendaraan;
use App\Http\Controllers\Controller;
use App\Models\Gambar;
use App\Models\Merek;
use App\Models\Modelken;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class DetailkendaraansController extends Controller
{

    public function show($id)
    {

        $kendaraan = Kendaraan::where('id', $id)->first();
        return view('admin/kendaraan.show2', compact('kendaraan'));
    }

}