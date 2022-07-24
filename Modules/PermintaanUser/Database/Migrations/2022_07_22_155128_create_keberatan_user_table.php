<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeberatanUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keberatan_user', function (Blueprint $table) {
            $table->id();
            $table->integer('id_permintaan');
            $table->string('noreg_keberatan');
            $table->string('alasan');
            $table->string('detail_alasan');
            $table->date('jatuh_tempo')->nullable();
            $table->integer('status')->default(0);
            $table->string('pendukung');
            $table->string('f_identitas');
            $table->string('tanggapan')->nullable();
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
        Schema::dropIfExists('keberatan_user');
    }
}
