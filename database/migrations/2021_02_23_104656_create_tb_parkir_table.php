<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbParkirTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_parkir', function (Blueprint $table) {
            $table->id('id_parkir');
            $table->foreignId('id_jenis')->nullable();
            $table->foreignId('id_operator')->nullable();
            $table->string('plat_nomor');
            $table->date('tgl_parkir');
            $table->timestamp('jam_masuk');
            $table->timestamp('jam_keluar')->nullable();
            $table->integer('tagihan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_parkir');
    }
}
