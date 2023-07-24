<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $fillable = [
        'nama_produk', 'kategori_id', 'sub_kategori_id', 'deskripsi', 'harga', 'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }

    public function subKategori()
    {
        return $this->belongsTo(SubKategori::class, 'sub_kategori_id', 'id');
    }
}
