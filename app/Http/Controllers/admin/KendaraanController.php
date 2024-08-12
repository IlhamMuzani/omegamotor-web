<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
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

class KendaraanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status;

        $query = Kendaraan::query();

        if ($status) {
            $query->where('status', $status);
        } else {
            $query->where('status', 'stok'); // Hanya status 'stok' jika $status tidak diberikan.
        }

        $kendaraans = $query->get();

        return view('admin.kendaraan.index', compact('kendaraans'));
    }


    public function create()
    {
        $mereks = Merek::all();
        $modelkens = Modelken::all();
        $tipes = Tipe::all();
        return view('admin/kendaraan.create', compact('mereks', 'modelkens', 'tipes'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_pol' => 'required',
                'no_rangka' => 'required',
                'no_mesin' => 'required',
                'tahun_kendaraan' => 'required',
                'warna' => 'required',
                'merek_id' => 'required',
                'transmisi' => 'required',
                'km_berjalan' => 'required',
            ],
            [
                'no_pol.required' => 'Masukkan no registrasi',
                'no_rangka.required' => 'Masukkan no rangka',
                'no_mesin.required' => 'Masukkan no mesin',
                'tahun_kendaraan.required' => 'Pilih Tahun',
                'warna.required' => 'Pilih warna',
                'merek_id.required' => 'Pilih merek',
                'transmisi.required' => 'Masukkan transmisi',
                'km_berjalan.required' => 'Masukka km berjalan',
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

        // if ($request->gambar_notis) {
        //     $gambar = str_replace(' ', '', $request->gambar_notis->getClientOriginalName());
        //     $namaGambar2 = 'gambar_notis/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        //     $request->gambar_notis->storeAs('public/uploads/', $namaGambar2);
        // } else {
        //     $namaGambar2 = null;
        // }

        // if ($request->gambar_bpkb) {
        //     $gambar = str_replace(' ', '', $request->gambar_bpkb->getClientOriginalName());
        //     $namaGambar3 = 'gambar_bpkb/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        //     $request->gambar_bpkb->storeAs('public/uploads/', $namaGambar3);
        // } else {
        //     $namaGambar3 = null;
        // }

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
        $kendaraan = Kendaraan::create(array_merge(
            $request->all(),
            [
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
                'kode_kendaraan' => $this->kode(),
                'qrcode_kendaraan' => 'https:///omegamotor.id/kendaraan/' . $kode,
                'tanggal_awal' => $tanggal,
                'status' => 'stok',
            ]
        ));

        if ($request->has('gambar')) {
            $gambars = $request->file('gambar');

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
        return redirect('admin/kendaraan')->with('success', 'Berhasil menambahkan kendaraan');
    }

    public function cetakqrcode($id)
    {
        $kendaraans = Kendaraan::find($id);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.kendaraan.cetak_pdf', compact('kendaraans'));

        // Mengatur jenis kertas dan orientasi menjadi lanscape
        $pdf->setPaper('landscape');

        return $pdf->stream('QrCodeKendaraan.pdf');
    }

    public function kode()
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

        $kendaraan = Kendaraan::where('id', $id)->first();
        return view('admin/kendaraan.show', compact('kendaraan'));
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->first();
        $mereks = Merek::all();
        $tipes = Tipe::all();
        $modelkens = Modelken::all();
        $gambars = Gambar::where('kendaraan_id', $kendaraan->id)->get();

        return view('admin/kendaraan.update', compact('gambars', 'modelkens', 'kendaraan', 'mereks', 'tipes'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'no_pol' => 'required',
                'no_rangka' => 'required',
                'no_mesin' => 'required',
                'tahun_kendaraan' => 'required',
                'warna' => 'required',
                'merek_id' => 'required',
                'transmisi' => 'required',
                'km_berjalan' => 'required',
            ],
            [
                'no_pol.required' => 'Masukkan no registrasi',
                'no_rangka.required' => 'Masukkan no rangka',
                'no_mesin.required' => 'Masukkan no mesin',
                'tahun_kendaraan.required' => 'Masukkan tahun',
                'warna.required' => 'Masukkan warna',
                'merek_id.required' => 'Pilih merek',
                'transmisi.required' => 'Masukkan transmisi',
                'km_berjalan.required' => 'Masukka km berjalan',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return back()->withInput()->with('error', $errors);
        }

        $kendaraan = Kendaraan::findOrFail($id);

        if ($request->gambar_stnk) {
            Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_stnk);
            $gambar = str_replace(' ', '', $request->gambar_stnk->getClientOriginalName());
            $namaGambar = 'gambar_stnk/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_stnk->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = $kendaraan->gambar_stnk;
        }

        // if ($request->gambar_notis) {
        //     Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_notis);
        //     $gambar = str_replace(' ', '', $request->gambar_notis->getClientOriginalName());
        //     $namaGambar2 = 'gambar_notis/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        //     $request->gambar_notis->storeAs('public/uploads/', $namaGambar2);
        // } else {
        //     $namaGambar2 = $kendaraan->gambar_notis;
        // }

        // if ($request->gambar_bpkb) {
        //     Storage::disk('local')->delete('public/uploads/' . $kendaraan->gambar_bpkb);
        //     $gambar = str_replace(' ', '', $request->gambar_bpkb->getClientOriginalName());
        //     $namaGambar3 = 'gambar_bpkb/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
        //     $request->gambar_bpkb->storeAs('public/uploads/', $namaGambar3);
        // } else {
        //     $namaGambar3 = $kendaraan->gambar_bpkb;
        // }

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

        Kendaraan::where('id', $id)->update(
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
        return redirect('admin/kendaraan')->with('success', 'Berhasil memperbarui kendaraan');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();

        return redirect('admin/kendaraan')->with('success', 'Berhasil menghapus Kendaraan');
    }

    public function merek(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_merek' => 'required',
                'modelken_id' => 'required',
                'tipe_id' => 'required',
            ],
            [
                'nama_merek.required' => 'Masukkan nama merek',
                'modelken_id.required' => 'Pilih model',
                'tipe_id.required' => 'Pilih tipe',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $kode = $this->kodemerek();

        Merek::create(array_merge(
            $request->all(),
            [
                'kode_merek' => $this->kodemerek(),
                'qrcode_merek' => 'https://omegamotor.id/merek/' . $kode,
                'tanggal_awal' => Carbon::now('Asia/Jakarta'),
            ],
        ));

        return back()->with('success', 'Berhasil menambahkan merek');
    }

    public function kodemerek()
    {
        $merek = Merek::all();
        if ($merek->isEmpty()) {
            $num = "000001";
        } else {
            $id = Merek::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'AD';
        $kode_merek = $data . $num;
        return $kode_merek;
    }

    public function print_kendaraan(Request $request)
    {
        $status = $request->status;

        $query = Kendaraan::orderBy('id', 'DESC');

        if ($status == "stok") {
            $query->where('status', $status);
        } else {
            $query->where('status', 'stok');
        }

        $inquery = $query->orderBy('id', 'DESC')->get();

        $pdf = PDF::loadView('admin.kendaraan.print', compact('inquery'));
        return $pdf->stream('Laporan_Kendaraan.pdf');
    }
}