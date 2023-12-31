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
use App\Models\Marketing;
use App\Models\Merek;
use App\Models\Modelken;
use App\Models\Pelanggan;
use App\Models\Pembelian;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class InqueryPembelianController extends Controller
{
    public function index(Request $request)
    {
        // $pembelians = Pembelian::get();
        // return view('admin/inquerypembelian.index', compact('pembelians'));

        $status = $request->status;
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $inquery = Pembelian::query();

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

        return view('admin/inquerypembelian.index', compact('inquery'));
    }


    public function show($id)
    {
        $pembelians = Pembelian::where('id', $id)->first();

        $kendaraans = Kendaraan::where('pembelian_id', $pembelians->id)->get();

        return view('admin.inquerypembelian.show', compact('kendaraans', 'pembelians'));
    }


    public function edit($id)
    {
        $pembelian = Pembelian::where('id', $id)->first();
        $kendaraan = Kendaraan::where('pembelian_id', $pembelian->id)->first();
        $mereks = Merek::all();
        $tipes = Tipe::all();
        $modelkens = Modelken::all();
        $pelanggans = Pelanggan::all();
        $gambars = Gambar::where('kendaraan_id', $kendaraan->id)->get();
        $marketings = Marketing::all();

        return view('admin/inquerypembelian.update', compact('marketings','gambars', 'modelkens', 'kendaraan', 'pembelian', 'mereks', 'tipes', 'pelanggans'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pelanggan_id' => 'required',
                'marketing_id' => 'required',
                'no_pol' => 'required',
                'no_rangka' => 'required',
                'no_mesin' => 'required',
                'tahun_kendaraan' => 'required',
                'warna' => 'required',
                'merek_id' => 'required',
                'transmisi' => 'required',
                'km_berjalan' => 'required',
                'harga' => 'required',
            ],
            [
                'pelanggan_id.required' => 'Pilih pelanggan',
                'marketing_id.required' => 'Pilih marketing',
                'no_pol.required' => 'Masukkan no registrasi',
                'no_rangka.required' => 'Masukkan no rangka',
                'no_mesin.required' => 'Masukkan no mesin',
                'tahun_kendaraan.required' => 'Masukkan tahun',
                'warna.required' => 'Masukkan warna',
                'merek_id.required' => 'Pilih merek',
                'transmisi.required' => 'Masukkan transmisi',
                'km_berjalan.required' => 'Masukka km berjalan',
                'harga.required' => 'Masukkan harga',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }


        $pembelian = Pembelian::where('id', $id)->update(
            [
                'pelanggan_id' => $request->pelanggan_id,
                'marketing_id' => $request->marketing_id,
                'harga' => $request->harga,
                'status' => 'posting',
            ]
        );

        $kendaraan = Kendaraan::where('pembelian_id', $id)->first();

        if ($request->gambar_stnk) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_stnk);
            $gambar = str_replace(' ', '', $request->gambar_stnk->getClientOriginalName());
            $namaGambar = 'gambar_stnk/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_stnk->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = $kendaraan->gambar_stnk;
        }

        if ($request->gambar_dokumen) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_dokumen);
            $gambar = str_replace(' ', '', $request->gambar_dokumen->getClientOriginalName());
            $namaGambar4 = 'gambar_dokumen/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_dokumen->storeAs('public/uploads/', $namaGambar4);
        } else {
            $namaGambar4 = $kendaraan->gambar_dokumen;
        }

        if ($request->gambar_faktur) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_faktur);
            $gambar = str_replace(' ', '', $request->gambar_faktur->getClientOriginalName());
            $namaGambar5 = 'gambar_faktur/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_faktur->storeAs('public/uploads/', $namaGambar5);
        } else {
            $namaGambar5 = $kendaraan->gambar_faktur;
        }

        if ($request->gambar_depan) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_depan);
            $gambar = str_replace(' ', '', $request->gambar_depan->getClientOriginalName());
            $namaGambar6 = 'gambar_depan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_depan->storeAs('public/uploads/', $namaGambar6);
        } else {
            $namaGambar6 = $kendaraan->gambar_depan;
        }

        if ($request->gambar_belakang) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_belakang);
            $gambar = str_replace(' ', '', $request->gambar_belakang->getClientOriginalName());
            $namaGambar7 = 'gambar_belakang/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_belakang->storeAs('public/uploads/', $namaGambar7);
        } else {
            $namaGambar7 = $kendaraan->gambar_belakang;
        }

        if ($request->gambar_kanan) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_kanan);
            $gambar = str_replace(' ', '', $request->gambar_kanan->getClientOriginalName());
            $namaGambar8 = 'gambar_kanan/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_kanan->storeAs('public/uploads/', $namaGambar8);
        } else {
            $namaGambar8 = $kendaraan->gambar_kanan;
        }

        if ($request->gambar_kiri) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_kiri);
            $gambar = str_replace(' ', '', $request->gambar_kiri->getClientOriginalName());
            $namaGambar9 = 'gambar_kiri/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_kiri->storeAs('public/uploads/', $namaGambar9);
        } else {
            $namaGambar9 = $kendaraan->gambar_kiri;
        }

        if ($request->gambar_dashboard) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_dashboard);
            $gambar = str_replace(' ', '', $request->gambar_dashboard->getClientOriginalName());
            $namaGambar10 = 'gambar_dashboard/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_dashboard->storeAs('public/uploads/', $namaGambar10);
        } else {
            $namaGambar10 = $kendaraan->gambar_dashboard;
        }

        if ($request->gambar_interior) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_interior);
            $gambar = str_replace(' ', '', $request->gambar_interior->getClientOriginalName());
            $namaGambar11 = 'gambar_interior/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_interior->storeAs('public/uploads/', $namaGambar11);
        } else {
            $namaGambar11 = $kendaraan->gambar_interior;
        }

        Kendaraan::where('pembelian_id', $id)->update(
            [
                'no_pol' => $request->no_pol,
                'no_rangka' => $request->no_rangka,
                'no_mesin' => $request->no_mesin,
                'tahun_kendaraan' => $request->tahun_kendaraan,
                'warna' => $request->warna,
                'merek_id' => $request->merek_id,
                'transmisi' => $request->transmisi,
                'km_berjalan' => $request->km_berjalan,
                'gambar_stnk' => $namaGambar,
                // 'gambar_notis' => $namaGambar2,
                // 'gambar_bpkb' => $namaGambar3,
                'gambar_dokumen' => $namaGambar4,
                'gambar_faktur' => $namaGambar5,
                'gambar_depan' => $namaGambar6,
                'gambar_belakang' => $namaGambar7,
                'gambar_kanan' => $namaGambar8,
                'gambar_kiri' => $namaGambar9,
                'gambar_dashboard' => $namaGambar10,
                'gambar_interior' => $namaGambar11,

            ]
        );

        if ($request->has('gambars')) {
            $gambars = $request->file('gambars');

            foreach ($gambars as $gambar) {
                $name = str_replace(' ', '', $gambar->getClientOriginalName());
                $namagambar = 'gambar/' . date('mYdHs') . random_int(1, 10) . '_' . $name;
                $gambar->storeAs('public/uploads', $namagambar);

                Gambar::create([
                    'kendaraan_id' => $kendaraan->id,
                    'gambar' => $namagambar
                ]);
            }
        }

        return redirect('admin/inquery_pembelian')->with('success', 'Berhasil memperbarui pembelian');
    }


    public function unpost($id)
    {
        $ban = Pembelian::where('id', $id)->first();

        $ban->update([
            'status' => 'unpost'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function posting($id)
    {
        $ban = Pembelian::where('id', $id)->first();

        $ban->update([
            'status' => 'posting'
        ]);

        return back()->with('success', 'Berhasil');
    }

    public function destroy($id)
    {
        $ban = Pembelian::find($id);
        $ban->detail_kendaraan()->delete();
        $ban->delete();

        return redirect('admin/inquery_pembelian')->with('success', 'Berhasil menghapus Pembelian');
    }
}