<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Marketing;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MarketingController extends Controller
{
    public function index()
    {
        $marketings = Marketing::get();
        return view('admin/marketing.index', compact('marketings'));
    }

    public function create()
    {
        return view('admin/marketing.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_marketing' => 'required',
                'nama_alias' => 'required',
                'gender' => 'required',
                'umur' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                // 'gambar_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nama_marketing.required' => 'Masukkan nama lengkap',
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

        $kode = $this->kode();

        $tanggal = Carbon::now()->format('Y-m-d');
        Marketing::create(array_merge(
            $request->all(),
            [
                'gambar_ktp' => $namaGambar,
                'kode_marketing' => $this->kode(),
                'qrcode_marketing' => 'https://omegamotor.id/marketing/' . $kode,
                'tanggal_awal' => $tanggal,

            ]
        ));

        return redirect('admin/marketing')->with('success', 'Berhasil menambahkan marketing');
    }

    public function kode()
    {
        $marketing = Marketing::all();
        if ($marketing->isEmpty()) {
            $num = "000001";
        } else {
            $id = Marketing::getId();
            foreach ($id as $value);
            $idlm = $value->id;
            $idbr = $idlm + 1;
            $num = sprintf("%06s", $idbr);
        }

        $data = 'AE';
        $kode_marketing = $data . $num;
        return $kode_marketing;
    }

    public function edit($id)
    {

        $marketing = Marketing::where('id', $id)->first();
        return view('admin/marketing.update', compact('marketing'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_marketing' => 'required',
                'nama_alias' => 'required',
                'gender' => 'required',
                'umur' => 'required',
                'telp' => 'required',
                'alamat' => 'required',
                // 'gambar_ktp' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            ],
            [
                'nama_marketing.required' => 'Masukkan nama lengkap',
                'nama_alias.required' => 'Masukkan nama alias',
                'gender.required' => 'Pilih gender',
                'umur.required' => 'Masukkan umur',
                'telp.required' => 'Masukkan no telepon',
                'alamat.required' => 'Masukkan alamat',
                // 'gambar_ktp.image' => 'Gambar yang dimasukan salah!',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $marketing = Marketing::findOrFail($id);

        if ($request->gambar_ktp) {
            Storage::disk('local')->delete('public/uploads/' . $marketing->gambar_ktp);
            $gambar = str_replace(' ', '', $request->gambar_ktp->getClientOriginalName());
            $namaGambar = 'gambar_ktp/' . date('mYdHs') . rand(1, 10) . '_' . $gambar;
            $request->gambar_ktp->storeAs('public/uploads/', $namaGambar);
        } else {
            $namaGambar = $marketing->gambar_ktp;
        }
        
        Marketing::where('id', $id)->update([
            'nama_marketing' => $request->nama_marketing,
            'nama_alias' => $request->nama_alias,
            'gender' => $request->gender,
            'umur' => $request->umur,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            // 'ig' => $request->ig,
            // 'fb' => $request->fb,
            'gambar_ktp' => $namaGambar,
        ]);

        return redirect('admin/marketing')->with('success', 'Berhasil memperbarui Marketing');
    }

    public function show($id)
    {


        $marketing = Marketing::where('id', $id)->first();
        return view('admin/marketing.show', compact('marketing'));
    }

    public function cetakqrcode($id)
    {
        $marketings = Marketing::find($id);
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('admin.marketing.cetak_pdf', compact('marketings'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->stream('QrCodeMarketing.pdf');
    }

    public function destroy($id)
    {
        $tipe = Marketing::find($id);
        $tipe->delete();

        return redirect('admin/marketing')->with('success', 'Berhasil menghapus Marketing');
    }
}