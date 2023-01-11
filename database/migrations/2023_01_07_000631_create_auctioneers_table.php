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
        Schema::create('auctioneers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('auctioneer_id');
            $table->string('nama_samaran');
            $table->string('token_pelelangan');
            $table->unsignedBigInteger('id_product');
            $table->foreign('id_product')->references('product_id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('user_id')->on('user')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('auctioneers');
    }
};
