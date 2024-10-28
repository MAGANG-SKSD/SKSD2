<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desas', function (Blueprint $table) {
            $table->id('desa_id');
            
            // Menggunakan string dengan panjang yang jelas
            $table->string('nama_desa', 255);
            $table->string('alamat_desa', 255);

            $table->string('kecamatan', 255);
            $table->string('kabupaten', 255);
            
            // Kode pos bisa tetap integer karena angka
            $table->integer('kode_pos');
            
            // Telepon diubah menjadi string karena bisa mengandung angka awal '0' atau '+'
            $table->string('telepon', 15);
            
            // Email menggunakan string
            $table->string('email', 255);
            
            // Menambahkan kolom timestamps untuk created_at dan updated_at
            $table->timestamps();
            
            // Soft delete untuk mendukung penghapusan sementara
            $table->softDeletes();
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
        Schema::dropIfExists('desas');
    }
}
