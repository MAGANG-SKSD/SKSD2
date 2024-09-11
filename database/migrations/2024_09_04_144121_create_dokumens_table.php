<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDokumensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->increments('dokumen_id');
            
            // Menggunakan unsignedInteger untuk foreign key, bukan increments
            $table->unsignedInteger('dana_id');
            
            // Menggunakan string untuk teks
            $table->string('jenis_dokumen', 255);
            $table->string('file_path', 255);
            $table->string('status_verifikasi', 255);
            
            // Soft delete untuk mendukung penghapusan sementara
            $table->softDeletes();

            // Tambahkan foreign key untuk dana_id
            $table->foreign('dana_id')->references('dana_id')->on('danas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Gunakan dropIfExists agar lebih aman
        Schema::dropIfExists('dokumens');
    }
}
