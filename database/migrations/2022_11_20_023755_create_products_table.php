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
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('category_id')->on('categories')->onDelete('cascade');
            $table->integer('kapasitas_cc');
            $table->integer('odometer');
            $table->integer('harga_awal');
            $table->string('nama_product');
            $table->string('product_slug')->unique();
            $table->string('merk');
            $table->string('nomor_mesin');
            $table->string('bahan_bakar');
            $table->string('warna_tnkb');
            $table->string('jenis');
            $table->string('nomor_rangka');
            $table->string('warna');
            $table->enum('status_pelelangan', ['berjalan', 'selesai'])->default('berjalan');
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
