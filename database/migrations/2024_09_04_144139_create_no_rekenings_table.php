<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoRekeningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_rekenings', function (Blueprint $table) {
            $table->increments('no_rekening_id');

            // Menggunakan unsignedInteger untuk foreign key, bukan increments
            $table->unsignedInteger('desa_id');
            
            // Menggunakan string jika kode rekening mungkin memiliki awalan nol atau karakter khusus
            $table->string('kode_rekening', 255);
            $table->string('uraian', 255);
            
            // Soft delete untuk mendukung penghapusan sementara
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
        // Gunakan dropIfExists agar lebih aman
        Schema::dropIfExists('no_rekenings');
    }
}
