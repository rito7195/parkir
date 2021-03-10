<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKonfigurasiKapasitasRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_konfigurasi_kapasitas', function (Blueprint $table) {
            $table->foreign('id_jenis')
                    ->references('id_jenis')
                    ->on('tb_jenis_kendaraan')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_admin')
                    ->references('id_admin')
                    ->on('tb_admin')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_konfigurasi_kapasitas_relations');
    }
}
