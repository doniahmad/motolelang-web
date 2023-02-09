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
        Schema::create('offers', function (Blueprint $table) {
            $table->id('offer_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_auction');
            $table->unsignedBigInteger('id_auctioneer');
            $table->foreign('id_auction')->references('auction_id')->on('auctions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_auctioneer')->references('auctioneer_id')->on('auctioneers')->onUpdate('cascade')->onDelete('cascade');
            $table->string('code_offer');
            $table->string('offer');
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
        Schema::dropIfExists('offers');
    }
};
