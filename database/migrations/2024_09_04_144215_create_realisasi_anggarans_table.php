<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealisasiAnggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realisasi_anggarans', function (Blueprint $table) {
            $table->increments('realisasi_id');

            // Menggunakan unsignedInteger untuk foreign key, bukan increments
            $table->unsignedInteger('desa_id');

            $table->date('tahun');
            $table->integer('belanja_realisasi');
            $table->integer('dana_tidak_terpakai');

            // Menggunakan string daripada char untuk fleksibilitas
            $table->string('laporan', 255);
            
            // Mendukung soft delete
            $table->softDeletes();

            // Tambahkan foreign key untuk desa_id
            $table->foreign('desa_id')->references('desa_id')->on('desas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Menggunakan dropIfExists untuk keamanan
        Schema::dropIfExists('realisasi_anggarans');
    }
}
