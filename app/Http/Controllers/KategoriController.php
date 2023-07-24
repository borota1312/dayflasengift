<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\SubKategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(string $nama)
    {
        $kategori = Kategori::where('nama', $nama)->first();
        $data = [
            'kategori' => $kategori,
            'subKategori' => SubKategori::where('kategori_id', $kategori->id)->get(),
            'nama' => $nama,
        ];
        return view('frontend.produk', $data);
    }

    public function subIndex(string $kategori, int $idsubKategori)
    {
        $subKategori = SubKategori::where('id', $idsubKategori)->first();
        return view('frontend.detail-produk', compact('subKategori'));
    }
}
