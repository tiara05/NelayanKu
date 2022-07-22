<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembayaran');
            $table->index('id_pembayaran');
            $table->unsignedBigInteger('id_produk');
            $table->index('id_produk');
            $table->unsignedBigInteger('id_user');
            $table->index('id_user');
            $table->unsignedBigInteger('id_nelayan');
            $table->index('id_nelayan');
            $table->integer('jumlah');
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
        Schema::dropIfExists('orders');
    }
}
