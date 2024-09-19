<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApbdesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apbdes', function (Blueprint $table) {
            $table->id(); // Primary Key (big integer, auto-increment)
            $table->integer('desa_id'); // Menambahkan kolom desa_id jika diperlukan
            $table->integer('tahun'); // Tahun anggaran
            $table->decimal('pendapatan', 15, 2); // Jumlah pendapatan (decimal dengan 2 angka di belakang koma)
            $table->decimal('belanja', 15, 2); // Jumlah belanja (decimal dengan 2 angka di belakang koma)
            $table->decimal('pembiayaan', 15, 2); // Jumlah pembiayaan (decimal dengan 2 angka di belakang koma)
            $table->string('status_verifikasi')->nullable(); // Status verifikasi (boleh null)
            $table->integer('id_detail_no_rekening')->nullable(); // No rekening (boleh null)
            $table->timestamps(); // created_at dan updated_at otomatis
            $table->softDeletes(); // deleted_at untuk soft delete
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apbdes');
    }
}
