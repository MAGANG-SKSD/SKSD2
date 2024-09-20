<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailNorekeningTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_norekening', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_norekening_id')->constrained('jenis_norekening')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kelompok_norekening_id')->constrained('kelompok_norekening')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama', 128)->nullable();
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
        Schema::dropIfExists('detail_norekening');
    }
}
