<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisNorekening extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_norekening', function (Blueprint $table) {
            $table->increments('id'); 
            $table->unsignedInteger('id_klasifikasi_belanja'); 
            $table->string('nama'); // Nama rekening
            $table->timestamps(); // Created at and Updated at
            
            // Adding foreign key constraint
            $table->foreign('id_klasifikasi_belanja')
                  ->references('id')
                  ->on('klasifikasi_belanja')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jenis_rekening', function (Blueprint $table) {
            $table->dropForeign(['id_klasifikasi_belanja']);
        });

        Schema::dropIfExists('jenis_rekening');
    }
}
