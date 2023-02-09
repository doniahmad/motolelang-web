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
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            $table->string('kode_pembayaran');
            $table->unsignedBigInteger("id_auctioneer");
            $table->unsignedBigInteger("id_auction");
            $table->foreign("id_auctioneer")->references("auctioneer_id")->on("auctioneers")->onUpdate("cascade");
            $table->foreign("id_auction")->references("auction_id")->on("auctions")->onUpdate("cascade");
            $table->integer("tagihan");
            $table->string("bukti_pembayaran")->nullable();
            $table->enum("status_pembayaran", ['belum_dibayar', 'menunggu_persetujuan', 'dibayar', 'ditolak'])->default('belum_dibayar');
            $table->string('alasan_penolakan')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
