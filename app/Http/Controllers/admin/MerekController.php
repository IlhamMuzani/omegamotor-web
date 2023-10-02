<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Dompdf\Dompdf;
use App\Models\Merek;
use App\Models\Ukuran;
use App\Models\Kendaraan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MerekController extends Controller
{
    public function index()
    {

        $mereks = Merek::paginate(4);
        return view('admin/merek.index', compact('mereks'));
    }

    public function create()
    {
        return view('admin/merek.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nama_merek' => 'required',
            ],
            [
                'nama_merek.required' => 'Masukkan nama merek',
            ]
        );

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        $kode = $this->kode();

        Merek::create(array_merge(
            $request->all(),
            [
                'kode_merek' => $this->kode(),
                'qrcode_merek' => 'https://omegamotor.id/merek/' . $kode,
                'tanggal_awal' => Carbon::now('Asia/Jakarta'),
            ],
        ));

        return redirect('admin/merek')->with('success', 'Berhasil menambahkan merek');
    }

    public function kode()
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

    public function edit($id)
    {

            $merek = Merek::where('id', $id)->first();
            return view('admin/merek.update', compact('merek'));
      
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_merek' => 'required',
        ], [
            'nama_merek.required' => 'Nama Merek tidak boleh Kosong',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->all();
            return back()->withInput()->with('error', $error);
        }

        Merek::where('id', $id)->update([
            'nama_merek' => $request->nama_merek,
        ]);

        return redirect('admin/merek')->with('success', 'Berhasil memperbarui Merek');
    }

    public function destroy($id)
    {
        $merek = Merek::find($id);
        $merek->delete();

        return redirect('admin/merek')->with('success', 'Berhasil menghapus Merek');
    }
}