<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kategoriseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'Bucket'],
            ['nama' => 'Akrilik'],
            ['nama' => 'Hampers'],
        ];
        foreach ($data as $key => $v) {
            $key++;
            $v = [
                'id' => $key,
                'nama' => $v['nama'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ];
            DB::table('kategori')->insert($v);
        }
    }
}
