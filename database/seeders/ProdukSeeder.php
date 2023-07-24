<?php

namespace Database\Seeders;

use App\Models\produk;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        produk::create([
            'nama_produk' => 'Bucket Makanan',
            'kategori_id' => 1,
            'sub_kategori_id' => 1,
            'deskripsi' => 'Isi makanan',
            'harga' => '20000',
            'gambar' => 'image/3.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        produk::create([
            'nama_produk' => 'Akrilik Mahar',
            'kategori_id' => 2,
            'sub_kategori_id' => 4,
            'deskripsi' => 'sadfadsf',
            'harga' => '20000',
            'gambar' => 'image/akrilik.jpg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        produk::create([
            'nama_produk' => 'request',
            'kategori_id' => 1,
            'sub_kategori_id' => 1,
            'deskripsi' => 'sasas',
            'harga' => '50000',
            'gambar' => 'image/avatar1.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
