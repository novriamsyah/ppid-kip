<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegisterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('pass');
            $table->integer('jenis_pemohon');
            $table->json('jenis_identitas');
            $table->json('nomor_identitas');
            $table->string('file_identitas');
            $table->string('npwp');
            $table->integer('pekerjaan');
            $table->string('alamat');
            $table->string('telp');
            $table->string('ket');
            // $table->string('token');
            // $table->rememberToken();
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
        Schema::dropIfExists('register');
    }
}
