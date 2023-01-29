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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('document_id');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nomor_polisi');
            $table->boolean('stnk');
            $table->boolean('bpkb');
            $table->boolean('form_a');
            $table->boolean('faktur');
            $table->boolean('kwitansi_blanko');
            $table->string('masa_stnk')->nullable();
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
        Schema::dropIfExists('documents');
    }
};
