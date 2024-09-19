<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelompokNorekening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok__norekening', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedInteger('id_klasifikasi_belanja'); 
            $table->string('nama'); // Nama rekening
            $table->timestamps(); // Created at and Updated at
            
            // Optional: Add a foreign key constraint if the klasifikasi_belanja table exists
            $table->foreign('id_klasifikasi_belanja')->references('id')->on('klasifikasi_belanja')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelompok__norekening');
    }
}
