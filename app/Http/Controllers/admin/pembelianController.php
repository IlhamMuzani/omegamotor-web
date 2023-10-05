<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Tipe;
use App\Models\Merek;
use App\Models\Modelken;
use Barryvdh\DomPDF\PDF;
use App\Models\Kendaraan;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PembelianController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();
        $mereks = Merek::all();
        $modelkens = Modelken::all();
        $tipes = Tipe::all();
        return view('admin/pembelian.create', compact('pelanggans', 'mereks', 'modelkens', 'tipes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pelanggan_id' => 'required',
                'no_pol' => 'required',
                'no_rangka' => 'required',
                'no_mesin' => 'required',
                'warna' => 'required',
                'merek_id' => 'required',
                'transmisi' => 'required',
                'km_berjalan' => 'required',
                'harga' => 'required',
                'vi_marketing' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pilih pelanggan',
                'no_pol.required' => 'Masukkan no registrasi',
                'no_rangka.required' => 'Masukkan no rangka',
                'no_mesin.required' => 'Masukkan no mesin',
                'warna.required' => 'Masukkan warna',
                'merek_id.required' => 'Pilih merek',
                'transmisi.required' => 'Masukkan transmisi',
                'km_berjalan.required' => 'Masukka km berjalan',
                'harga.required' => 'Masukkan harga',
                'vi_marketing.required' => 'Masukkan vi marketing',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }


        if ($request->gambar_stnk) {
            $gambar = str_replace(' ', '', $request->gambar_stnk->getClientOriginalName());
            $namaGambar = 'gambar_stnk/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_stnk->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = null;
        }

        if ($request->gambar_notis) {
            $gambar = str_replace(' ', '', $request->gambar_notis->getClientOriginalName());
            $namaGambar2 = 'gambar_notis/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_notis->storeAs('public/uploads/', $namaGambar2);
        } else {
            $namaGambar2 = null;
        }

        if ($request->gambar_bpkb) {
            $gambar = str_replace(' ', '', $request->gambar_bpkb->getClientOriginalName());
            $namaGambar3 = 'gambar_bpkb/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_bpkb->storeAs('public/uploads/', $namaGambar3);
        } else {
            $namaGambar3 = null;
        }

        if ($request->gambar_dokumen) {
            $gambar = str_replace(' ', '', $request->gambar_dokumen->getClientOriginalName());
            $namaGambar4 = 'gambar_dokumen/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_dokumen->storeAs('public/uploads/', $namaGambar4);
        } else {
            $namaGambar4 = null;
        }

        if ($request->gambar_faktur) {
            $gambar = str_replace(' ', '', $request->gambar_faktur->getClientOriginalName());
            $namaGambar5 = 'gambar_faktur/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_faktur->storeAs('public/uploads/', $namaGambar5);
        } else {
            $namaGambar5 = null;
        }

        if ($request->gambar_depan) {
            $gambar = str_replace(' ', '', $request->gambar_depan->getClientOriginalName());
            $namaGambar6 = 'gambar_depan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_depan->storeAs('public/uploads/', $namaGambar6);
        } else {
            $namaGambar6 = null;
        }

        if ($request->gambar_belakang) {
            $gambar = str_replace(' ', '', $request->gambar_depan->getClientOriginalName());
            $namaGambar7 = 'gambar_belakang/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_belakang->storeAs('public/uploads/', $namaGambar7);
        } else {
            $namaGambar7 = null;
        }

        if ($request->gambar_kanan) {
            $gambar = str_replace(' ', '', $request->gambar_kanan->getClientOriginalName());
            $namaGambar8 = 'gambar_kanan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_kanan->storeAs('public/uploads/', $namaGambar8);
        } else {
            $namaGambar8 = null;
        }

        if ($request->gambar_kiri) {
            $gambar = str_replace(' ', '', $request->gambar_kiri->getClientOriginalName());
            $namaGambar9 = 'gambar_kiri/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_kiri->storeAs('public/uploads/', $namaGambar9);
        } else {
            $namaGambar9 = null;
        }

        if ($request->gambar_dashboard) {
            $gambar = str_replace(' ', '', $request->gambar_dashboard->getClientOriginalName());
            $namaGambar10 = 'gambar_dashboard/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_dashboard->storeAs('public/uploads/', $namaGambar10);
        } else {
            $namaGambar10 = null;
        }

        if ($request->gambar_interior) {
            $gambar = str_replace(' ', '', $request->gambar_interior->getClientOriginalName());
            $namaGambar11 = 'gambar_interior/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_interior->storeAs('public/uploads/', $namaGambar11);
        } else {
            $namaGambar11 = null;
        }

        $kode = $this->kode();

        $tanggal = Carbon::now()->format('Y-m-d');
        $pembelian = Pembelian::create(array_merge(
            $request->all(),
            [
                'pelanggan_id' => $request->pelanggan_id,
                'harga' => $request->harga,
                'vi_marketing' => $request->vi_marketing,
                'kode_pembelian' => $this->kode(),
                'qrcode_pembelian' => 'https:///omega.id/pembelian/' . $kode,
                'tanggal_awal' => $tanggal,
                'status' => 'posting',
            ]
        ));

        $kode = $this->kodekendaraan();
        $pembelian_id = $pembelian->id;

        $tanggal = Carbon::now()->format('Y-m-d');
        Kendaraan::create(array_merge(
            $request->all(),
            [
                'pembelian_id' => $pembelian_id,
                'gambar_stnk' => $namaGambar,
                'gambar_notis' => $namaGambar2,
                'gambar_bpkp' => $namaGambar3,
                'gambar_dokumen' => $namaGambar4,
                'gambar_faktur' => $namaGambar5,
                'gambar_depan' => $namaGambar6,
                'gambar_belakang' => $namaGambar7,
                'gambar_kanan' => $namaGambar8,
                'gambar_kiri' => $namaGambar9,
                'gambar_dashboard' => $namaGambar10,
                'gambar_interior' => $namaGambar11,
                'no_pol' => $request->no_pol,
                'no_rangka' => $request->no_rangka,
                'no_mesin' => $request->no_mesin,
                'warna' => $request->warna,
                'merek_id' => $request->merek_id,
                'transmisi' => $request->transmisi,
                'km_berjalan' => $request->km_berjalan,
                'kode_kendaraan' => $this->kodekendaraan(),
                'qrcode_kendaraan' => 'https:///omega.id/kendaraan/' . $kode,
                'tanggal_awal' => $tanggal,
            ]
        ));

        $pembelians = Pembelian::find($pembelian_id);

        $kendaraans = Kendaraan::where('pembelian_id', $pembelians->id)->get();


        return view('admin.pembelian.show', compact('kendaraans', 'pembelians'));
    }

    public function kode()
    {
        $kendaraan = Pembelian::all();
        if ($kendaraan->isEmpty()) {
            $num = "000001";
        } else {
            $id = Pembelian::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'FM';
        $kode_kendaraan = $data . $num;
        return $kode_kendaraan;
    }

    public function kodekendaraan()
    {
        $kendaraan = Kendaraan::all();
        if ($kendaraan->isEmpty()) {
            $num = "000001";
        } else {
            $id = Kendaraan::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'AG';
        $kode_kendaraan = $data . $num;
        return $kode_kendaraan;
    }
    public function show($id)
    {
        $pembelians = Pembelian::where('id', $id)->first();

        $kendaraans = Kendaraan::where('pembelian_id', $pembelians->id)->get();

        return view('admin.pembelian.show', compact('kendaraans', 'pembelians'));
    }

    public function cetakpdf($id)
    {
        $pembelians = Pembelian::find($id);
        $kendaraans = Kendaraan::where('pembelian_id', $pembelians->id)->get();

        // Create an instance of PDF
        $pdf = app('dompdf.wrapper');

        // Load the view into the PDF instance
        $pdf->loadView('admin.pembelian.cetak_pdf', compact('kendaraans', 'pembelians'));

        // Set other configurations if needed
        $pdf->setPaper('letter', 'portrait'); // Example configuration

        // Return the PDF as a response
        return $pdf->stream('Faktur_Pembelian.pdf');
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