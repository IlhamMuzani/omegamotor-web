<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use Illuminate\Support\Facades\Storage;

class GambarController extends Controller
{
    public function hapus_gambar($id)
    {
        $gambar =  Gambar::find($id);
        Storage::disk('local')->delete('public/uploads/' . $gambar->gambar);
        $gambar->delete();
        return back()->with('success', 'Gambar dihapus!');
    }
}