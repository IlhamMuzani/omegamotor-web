<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Penjualan extends Model
{
    protected $fillable =
    [
        'kode_penjualan',
        'qrcode_penjualan',
        'pelanggan_id',
        'kendaraan_id',
        'marketing_id',
        'harga',
        'vi_marketing',
        'status',
        'status_komisi',
        'tanggal',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }

    public function marketing()
    {
        return $this->belongsTo(Marketing::class);
    }

    public static function getId()
    {
        return $getId = DB::table('penjualans')->orderBy('id', 'DESC')->take(1)->get();
    }
}