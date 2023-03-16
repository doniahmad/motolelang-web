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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            $table->unsignedBigInteger("id_auctioneer");
            $table->foreign("id_auctioneer")->references("auctioneer_id")->on("auctioneers")->onUpdate("cascade")->onDelete('cascade');
            $table->integer("invoice");
            $table->string("kode_pembayaran");
            $table->string("bukti_pembayaran")->nullable();
            $table->enum("status", ['belum_dibayar', 'menunggu_persetujuan', 'dibayar', 'ditolak'])->default('belum_dibayar');
            $table->string('alasan_penolakan')->nullable();
            $table->unsignedBigInteger('id_ongkir')->nullable();
            $table->foreign('id_ongkir')->references('ongkir_id')->on('ongkirs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('invoices');
    }
};
