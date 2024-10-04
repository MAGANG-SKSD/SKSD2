<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type');
            $table->string('lang');
            $table->bigInteger('created_by');
            $table->string('avatar')->nullable();
            $table->unsignedBigInteger('desa_id')->nullable(); // Tambahkan kolom desa_id
            $table->foreign('desa_id')->references('desa_id')->on('desas')->onDelete('set null'); // Relasi foreign key
            $table->rememberToken();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['desa_id']); // Drop foreign key dulu
        });
        Schema::dropIfExists('users');
    }
}
