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
        Schema::create('pesanan_sayas', function (Blueprint $table) {
            $table->increments('id_pemesanan');
            $table->unsignedInteger("kode_pemesanan_id");
            $table->string("status", 20);
            $table->timestamps();
            $table->foreign('kode_pemesanan_id')->references('kode_pemesanan')->on('pemesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanan_sayas');
    }
};
