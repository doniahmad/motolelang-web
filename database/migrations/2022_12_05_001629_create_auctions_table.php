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
        Schema::create('auctions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('auction_id');
            $table->string('token');
            $table->boolean('status');
            $table->dateTime('exp_date');
            $table->softDeletes();
            $table->integer('kelipatan_bid');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_winner')->nullable();
            $table->foreign('id_product')->references('product_id')->on('products')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('auctions');
    }
};
