<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKonfigurasiKapasitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konfigurasi_kapasitas', function (Blueprint $table) {
            $table->id('id_kapasitas');
            $table->foreignId('id_jenis')->nullable();
            $table->foreignId('id_admin')->nullable();
            $table->integer('kapasitas')->default(0);
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
        Schema::dropIfExists('konfigurasi_kapasitas');
    }
}
