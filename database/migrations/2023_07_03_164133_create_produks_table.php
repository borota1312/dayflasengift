<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string("nama_produk", 100);
            $table->foreignId('kategori_id')->references('id')->on('kategori');
            $table->foreignId('sub_kategori_id')->nullable()->references('id')->on('sub_kategori');
            $table->string("deskripsi", 200);
            $table->string("harga", 20);
            $table->string("gambar", 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
};
