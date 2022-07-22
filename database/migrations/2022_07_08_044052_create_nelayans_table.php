<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNelayansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nelayans', function (Blueprint $table) {
            $table->id();
            $table->string('username');    
            $table->string('password');
            $table->string('email');
            $table->string('name');
            $table->string('nomortelepon');
            $table->string('status')-> default('Non Aktif');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kotakab');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('foto');
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
        Schema::dropIfExists('nelayans');
    }
}
