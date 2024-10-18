<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surats', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('nomor_sp2d'); // Nomor unik SP2D
            $table->date('tanggal_sp2d'); // Tanggal penerbitan SP2D
            $table->string('nama_kegiatan'); // Nama kegiatan terkait
            $table->decimal('nilai_sp2d', 15, 2); // Jumlah dana yang dicairkan
            $table->string('kode_rekening'); // Kode rekening terkait
            $table->string('nama_penerima'); // Nama penerima dana
            $table->string('bank_tujuan'); // Nama bank tujuan
            $table->string('nomor_rekening_bank'); // Nomor rekening penerima
            $table->text('uraian_penggunaan')->nullable(); // Uraian penggunaan dana (opsional)
            $table->string('jenis_belanja')->nullable(); // Jenis belanja (opsional)
            $table->year('tahun_anggaran'); // Tahun anggaran
            $table->string('nama_bendahara'); // Nama bendahara
            $table->enum('status_verifikasi', ['Diverifikasi', 'Disetujui', 'Dalam Proses'])->default('Dalam Proses'); // Status verifikasi
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surats');
    }
}
