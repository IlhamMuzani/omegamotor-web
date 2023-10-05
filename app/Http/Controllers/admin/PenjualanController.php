<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tipe;
use App\Models\Merek;
use App\Models\Modelken;
use Barryvdh\DomPDF\PDF;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PenjualanController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        $kendaraans = Kendaraan::all();
        return view('admin/penjualan.create', compact('pelanggans', 'kendaraans'));
    }

    public function store(Request $request)
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

        $kode = $this->kode();

        $tanggal = Carbon::now()->format('Y-m-d');
        $penjualans = Penjualan::create(array_merge(
            $request->all(),
            [
                'pelanggan_id' => $request->pelanggan_id,
                'kendaraan_id' => $request->kendaraan_id,
                'harga' => $request->harga,
                'vi_marketing' => $request->vi_marketing,
                'kode_penjualan' => $this->kode(),
                'qrcode_penjualan' => 'https:///omega.id/penjualan/' . $kode,
                'tanggal_awal' => $tanggal,
                'status' => 'posting',
            ]
        ));
        return view('admin.penjualan.show', compact('penjualans'));
    }

    public function kode()
    {
        $kendaraan = Penjualan::all();
        if ($kendaraan->isEmpty()) {
            $num = "000001";
        } else {
            $id = Penjualan::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'FP';
        $kode_kendaraan = $data . $num;
        return $kode_kendaraan;
    }

    public function show($id)
    {
        $penjualans = Penjualan::where('id', $id)->first();

        return view('admin.penjualan.show', compact('penjualans'));
    }

    public function cetakpdf($id)
    {
        $penjualans = Penjualan::find($id);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.penjualan.cetak_pdf', compact('penjualans'));
        $pdf->setPaper('letter', 'portrait'); 

        // Return the PDF as a response
        return $pdf->stream('Faktur_Penjualan.pdf');
    }

    public function pelanggan(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_pelanggan' => 'required',
                'nama_alias' => 'required',
                'gender' => 'required',
                'umur' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                // 'gambar_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nama_pelanggan.required' => 'Masukkan nama lengkap',
                'nama_alias.required' => 'Masukkan nama alias',
                'gender.required' => 'Pilih gender',
                'umur.required' => 'Masukkan umur',
                'telp.required' => 'Masukkan no telepon',
                'alamat.required' => 'Masukkan alamat',
                // 'gambar_ktp.image' => 'Gambar yang dimasukan salah!',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        if ($request->gambar_ktp) {
            $gambar = str_replace(' ', '', $request->gambar_ktp->getClientOriginalName());
            $namaGambar = 'gambar_ktp/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_ktp->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = null;
        }

        $kode = $this->kodepelanggan();

        $tanggal = Carbon::now()->format('Y-m-d');
        Pelanggan::create(array_merge(
            $request->all(),
            [
                'gambar' => $namaGambar,
                'kode_pelanggan' => $this->kodepelanggan(),
                'qrcode_pelanggan' => 'https://javaline.id/pelanggan/' . $kode,
                'tanggal_awal' => $tanggal,

            ]
        ));

        return back()->with('success', 'Berhasil menambahkan pelanggan');
    }

    public function kodepelanggan()
    {
        $pelanggan = Pelanggan::all();
        if ($pelanggan->isEmpty()) {
            $num = "000001";
        } else {
            $id = Pelanggan::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'AH';
        $kode_pelanggan = $data . $num;
        return $kode_pelanggan;
    }
}