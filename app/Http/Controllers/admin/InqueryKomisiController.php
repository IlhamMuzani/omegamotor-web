<?php

namespace App\Http\Controllers\Admin;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Komisi;
use App\Models\Marketing;
use App\Models\Merek;
use App\Models\Modelken;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Penjualan;
use App\Models\Tipe;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class InqueryKomisiController extends Controller
{
    public function index()
    {
        $komisis = Komisi::get();
        return view('admin/inquerykomisi.index', compact('komisis'));
    }


    public function show($id)
    {
        $komisis = Komisi::where('id', $id)->first();
        return view('admin.inquerykomisi.show', compact('komisis'));
    }

    public function edit($id)
    {
        $komisis = Komisi::where('id', $id)->first();
        $pembelians = Pembelian::all();
        $penjualans = Penjualan::all();
        $marketings = Marketing::all();

        return view('admin/inquerykomisi.update', compact('komisis', 'pembelians', 'penjualans', 'marketings'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'kategori' => 'required',
                'kode_faktur' => 'required',
                'marketing_id' => 'required',
                'harga' => 'required',
                'fee' => 'required',
            ],
            [
                'kategori.required' => 'Pilih kategori',
                'kode_faktur.required' => 'Masukan kode faktur',
                'marketing_id.required' => 'Pilih marketing',
                'harga.required' => 'Masukkan harga',
                'fee.required' => 'Masukkan fee',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $komisi = Komisi::where('id', $id)->update(
            [
                'kategori' => $request->kategori,
                'pelanggan_id' => $request->pelanggan_id,
                'penjualan_id' => $request->penjualan_id,
                'pembelian_id' => $request->pembelian_id,
                'marketing_id' => $request->marketing_id,
                'harga' => $request->harga,
                'kode_faktur' => $request->kode_faktur,
                'fee' => $request->fee,
                'status' => 'posting',
            ]
        );

        return redirect('admin/inquery_komisi')->with('success', 'Berhasil memperbarui komisi');
    }


    public function unpostkomisi($id)
    {
        $ban = Komisi::where('id', $id)->first();

        $ban->update([
            'status' => 'unpost'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function postingkomisi($id)
    {
        $ban = Komisi::where('id', $id)->first();

        $ban->update([
            'status' => 'posting'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function destroy($id)
    {
        $ban = Komisi::find($id);
        $ban->delete();

        return redirect('admin/inquery_komisi')->with('success', 'Berhasil menghapus komisi');
    }
}