<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbParkirRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_parkir', function (Blueprint $table) {
            $table->foreign('id_jenis')
                    ->references('id_jenis')
                    ->on('tb_jenis_kendaraan')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->foreign('id_operator')
                    ->references('id_operator')
                    ->on('tb_operator')
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
        Schema::dropIfExists('relations');
    }
}
