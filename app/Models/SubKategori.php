<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategori extends Model
{
    use HasFactory;
    protected $table = 'sub_kategori';

    public function produk()
    {
        return $this->hasMany(produk::class, 'sub_kategori_id', 'id');
    }
}
