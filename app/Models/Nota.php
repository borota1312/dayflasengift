<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = [
        'kode_pesan',
        'pembeli_id',
        'tanggal_pemesanan',
        'total',
        'status'
    ];
}
