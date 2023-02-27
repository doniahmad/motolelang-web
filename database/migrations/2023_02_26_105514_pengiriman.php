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
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->id('pengiriman_id');
            $table->enum('status', ['perjalanan', 'diterima']);
            $table->string("bukti_penerimaan")->nullable();
            $table->unsignedBigInteger('id_invoice');
            $table->foreign('id_invoice')->references('invoice_id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_kurir');
            $table->foreign('id_kurir')->references('user_id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pengiriman');
    }
};
