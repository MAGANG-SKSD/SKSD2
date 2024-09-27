<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiRealisasiToAnggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggaran', function (Blueprint $table) {
            $table->bigInteger('nilai_realisasi')->nullable(); // Tambahkan field ini
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggaran', function (Blueprint $table) {
            $table->dropColumn('nilai_realisasi');
        });
    }
}
