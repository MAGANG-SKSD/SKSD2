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
            $table->integer('id_klasifikasi_belanja')
            ->references('id')
            ->on('klasifikasi_belanja')
            ->onDelete('cascade');
            $table->integer('id_jenis_norekening')
            ->references('id')
            ->on('jenis_norekening')
            ->onDelete('cascade');
            $table->integer('id_kelompok_norekening')
            ->references('id')
            ->on('kelompok_norekening')
            ->onDelete('cascade');
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
        
        Schema::table('detail_norekening', function (Blueprint $table) {
            $table->dropForeign(['id_klasifikasi_belanja']);
        });
        Schema::table('detail_norekening', function (Blueprint $table) {
            $table->dropForeign(['id_jenis_norekening']);
        });
        Schema::table('detail_norekening', function (Blueprint $table) {
            $table->dropForeign(['id_kelompok_norekening']);
        });


        Schema::drop('detail_norekening');
    }
}
