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
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class InqueryKomisiController extends Controller
{
    public function index(Request $request)
    {
        // $komisis = Komisi::get();
        // return view('admin/inquerykomisi.index', compact('komisis'));

        $status = $request->status;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $inquery = Komisi::query();

        if ($status) {
            $inquery->where('status', $status);
        }

        if ($tanggal_awal && $tanggal_akhir) {
            $inquery->whereBetween('tanggal_awal', [$tanggal_awal, $tanggal_akhir]);
        } elseif ($tanggal_awal) {
            $inquery->where('tanggal_awal', '>=', $tanggal_awal);
        } elseif ($tanggal_akhir) {
            $inquery->where('tanggal_awal', '<=', $tanggal_akhir);
        } else {
            // Jika tidak ada filter tanggal hari ini
            $inquery->whereDate('tanggal_awal', Carbon::today());
        }

        $inquery->orderBy('id', 'DESC');
        $inquery = $inquery->get();

        return view('admin/inquerykomisi.index', compact('inquery'));
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

        $kategori = $request->kategori;

        $penjualan_id = null;
        $pembelian_id = null;

        if ($kategori === 'Pembelian') {
            $pembelian_id = $request->pembelian_id;
        } elseif ($kategori === 'Penjualan') {
            $penjualan_id = $request->penjualan_id;
        }

        $komisi = Komisi::where('id', $id)->update(
            [
                'kategori' => $request->kategori,
                'pelanggan_id' => $request->pelanggan_id,
                'kendaraan_id' => $request->kendaraan_id,
                'marketing_id' => $request->marketing_id,
                'harga' => $request->harga,
                'kode_faktur' => $request->kode_faktur,
                'fee' => $request->fee,
                'status' => 'posting',
                'penjualan_id' => $penjualan_id, // Set penjualan_id based on the condition
                'pembelian_id' => $pembelian_id, // Set pembelian_id based on the condition
            ]
        );

        if ($kategori == 'Penjualan') {
            $faktur = Penjualan::where('id', $penjualan_id)->update([
                'status_komisi' => 'aktif',
            ]);
        } elseif ($kategori == 'Pembelian') {
            $faktur = Pembelian::where('id', $pembelian_id)->update([
                'status_komisi' => 'aktif',
            ]);
        }

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
        $komisi = Komisi::find($id);

        if ($komisi) {
            if ($komisi->kategori === 'Penjualan') {
                $faktur = Penjualan::where('id', $komisi->penjualan_id)->update([
                    'status_komisi' => 'tidak aktif',
                ]);
            } elseif ($komisi->kategori === 'Pembelian') {
                $faktur = Pembelian::where('id', $komisi->pembelian_id)->update([
                    'status_komisi' => 'tidak aktif',
                ]);
            }

            $komisi->delete();
            return redirect('admin/inquery_komisi')->with('success', 'Berhasil menghapus komisi');
        } else {
            return redirect('admin/inquery_komisi')->with('error', 'Komisi tidak ditemukan');
        }
    }
}