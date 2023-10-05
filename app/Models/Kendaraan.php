<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pembelian_id',
        'no_pol',
        'no_rangka',
        'no_mesin',
        'warna',
        'qrcode_kendaraan',
        'kode_kendaraan',
        'merek_id',
        'modelken_id',
        'tipe_id',
        'transmisi',
        'km_berjalan',
        'gambar_stnk',
        'gambar_notis',
        'gambar_bpkb',
        'gambar_dokumen',
        'gambar_faktur',
        'gambar_depan',
        'gambar_belakang',
        'gambar_kanan',
        'gambar_kiri',
        'gambar_dashboard',
        'gambar_interior',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    public static function getId()
    {
        return $getId = DB::table('kendaraans')->orderBy('id', 'DESC')->take(1)->get();
    }

    public function merek()
    {
        return $this->belongsTo(Merek::class);
    }
}