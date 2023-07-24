<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';

    public function subKategori()
    {
        return $this->hasOne(SubKategori::class, 'kategori_id', 'id');
    }

    public function subKategories()
    {
        return $this->hasMany(SubKategori::class, 'kategori_id', 'id');
    }
}
