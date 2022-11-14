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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('nama_product');
            $table->string('product_slug')->unique();
            $table->string('merk');
            $table->string('kapasitas_cc');
            $table->string('nomor_mesin');
            $table->string('bahan_bakar');
            $table->string('warna_tnkb');
            $table->string('odometer');
            $table->string('jenis');
            $table->string('nomor_rangka');
            $table->string('waktu_mulai');
            $table->string('waktu_selesai');
            $table->string('harga_awal');
            // $table->foreignId('id_document')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};
