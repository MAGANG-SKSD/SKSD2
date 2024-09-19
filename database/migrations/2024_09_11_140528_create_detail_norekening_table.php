<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNorekeningTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_norekening', function (Blueprint $table) {
            $table->integer('id');
            $table->char('nama');
            $table->integer('id_klasifikasi_norekening');
            $table->integer('id_jenis_norekening');
            $table->integer('id_kelompok_norekening');
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
        Schema::drop('detail_norekening');
    }
}
