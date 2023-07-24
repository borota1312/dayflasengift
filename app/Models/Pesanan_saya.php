<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan_saya extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_pemesanan';
    protected $table = 'pesanan_saya';
}
