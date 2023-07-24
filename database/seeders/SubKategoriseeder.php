<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubKategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['kategori_id' => 1, 'nama' => 'Bucket Makanan'],
            ['kategori_id' => 1, 'nama' => 'Bucket Uang'],
            ['kategori_id' => 1, 'nama' => 'Bucket Bunga'],
            ['kategori_id' => 2, 'nama' => 'Akrilik Mahar'],
            ['kategori_id' => 3, 'nama' => 'Hampers Boneka'],
        ];

        foreach ($data as $key => $v) {
            $key++;
            $v = [
                'id' => $key,
                'kategori_id' => $v['kategori_id'],
                'nama' => $v['nama'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('sub_kategori')->insert($v);
        }
    }
}
