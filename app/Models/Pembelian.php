<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pembelian extends Model
{
    protected $fillable =
    [
        'kode_pembelian',
        'qrcode_pembelian',
        'pelanggan_id',
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

    public function detail_kendaraan()
    {
        return $this->hasMany(Kendaraan::class);
    }
    
    public static function getId()
    {
        return $getId = DB::table('pembelians')->orderBy('id', 'DESC')->take(1)->get();
    }
}