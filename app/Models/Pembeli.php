<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = 'pembelis';
    protected $fillable = [
        'nama_pembeli', 'alamat_pembeli','no_hp','jenis_kelamin'
    ];
}
