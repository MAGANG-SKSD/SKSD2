<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSp2dsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sp2ds', function (Blueprint $table) {
            $table->increments('sp2d_id');

            // Menggunakan unsignedInteger untuk foreign key, bukan increments
            $table->unsignedInteger('desa_id');

            $table->integer('nomor_sp2d');
            $table->date('tanggal_sp2d');
            $table->integer('jumlah_dana');

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
        Schema::dropIfExists('sp2ds');
    }
}
