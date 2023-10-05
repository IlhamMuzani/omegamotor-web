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
use App\Models\Merek;
use App\Models\Modelken;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class InqueryPenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::paginate(4);
        return view('admin/inquerypenjualan.index', compact('penjualans'));
    }

    
    public function show($id)
    {
        $penjualans = Penjualan::where('id', $id)->first();

        return view('admin.inquerypenjualan.show', compact('penjualans'));
    }


    public function edit($id)
    {
        $penjualan = Penjualan::where('id', $id)->first();
        $kendaraans = Kendaraan::all();
        $pelanggans = Pelanggan::all();

        return view('admin/inquerypenjualan.update', compact('kendaraans', 'pelanggans', 'penjualan'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pelanggan_id' => 'required',
                'kendaraan_id' => 'required',
                'harga' => 'required',
                'vi_marketing' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pilih pelanggan',
                'kendaraan_id.required' => 'Pilih Kendaraan',
                'harga.required' => 'Masukkan harga',
                'vi_marketing.required' => 'Masukkan vi marketing',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $penjualan = Penjualan::where('id', $id)->update(
            [
                'pelanggan_id' => $request->pelanggan_id,
                'kendaraan_id' => $request->kendaraan_id,
                'harga' => $request->harga,
                'vi_marketing' => $request->vi_marketing,
                'status' => 'posting',
            ]
        );

        return redirect('admin/inquery_penjualan')->with('success', 'Berhasil memperbarui penjualan');
    }
    

    public function unpostpenjualan($id)
    {
        $ban = Penjualan::where('id', $id)->first();

        $ban->update([
            'status' => 'unpost'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function postingpenjualan($id)
    {
        $ban = Penjualan::where('id', $id)->first();

        $ban->update([
            'status' => 'posting'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function destroy($id)
    {
        $ban = Penjualan::find($id);
        $ban->delete();

        return redirect('admin/inquery_penjualan')->with('success', 'Berhasil menghapus Penjualan');
    }

}