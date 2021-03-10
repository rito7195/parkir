<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKonfigurasiTarifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_konfigurasi_tarif', function (Blueprint $table) {
            $table->id('id_tarif');
            $table->foreignId('id_jenis')->nullable();
            $table->foreignId('id_admin')->nullable();
            $table->integer('tarif_normal')->default(0);
            $table->integer('tarif_inap')->default(0);
            $table->integer('jam_inap')->default(0);
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
        Schema::dropIfExists('konfigurasi_tarifs');
    }
}
