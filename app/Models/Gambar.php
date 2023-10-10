<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gambar extends Model
{
    use HasFactory;
    protected $fillable = [
        'kendaraan_id',
        'gambar',
    ];
}