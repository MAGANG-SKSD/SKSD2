<?php
// database/migrations/xxxx_xx_xx_create_anggaran_kas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggaranKasTable extends Migration
{
    public function up()
    {
        Schema::create('anggaran_kas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('anggaran_kas');
    }
}
