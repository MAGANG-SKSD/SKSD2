<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->foreignId('detail_norekening_id')->constrained('detail_norekening')->onDelete('cascade')->onUpdate('cascade');
            $table->text('keterangan_lainnya')->nullable();
            $table->bigInteger('nilai_anggaran');
            // $table->bigInteger('nilai_realisasi');
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
        Schema::dropIfExists('anggaran');
    }
}
