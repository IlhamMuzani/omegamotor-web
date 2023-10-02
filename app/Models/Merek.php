<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Merek extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_merek',
        'nama_merek',
        'qrcode_merek',
        'tanggal_awal',
        'tanggal_akhir',
    ];

    public static function getId()
    {
        return $getId = DB::table('mereks')->orderBy('id', 'DESC')->take(1)->get();
    }
}