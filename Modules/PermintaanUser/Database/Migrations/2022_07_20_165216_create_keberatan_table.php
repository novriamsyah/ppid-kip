<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeberatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keberatan', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_permintaan')->unsigned();
            $table->string('noreg_keberatan');
            $table->string('alasan');
            $table->string('detail_alasan');
            $table->date('jatuh_tempo')->nullable();
            $table->integer('status')->default(0);
            $table->string('pendukung');
            $table->string('tanggapan')->nullable();
            $table->timestamps();
            $table->foreign('id_permintaan')->references('id')->on('permintaan_users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keberatan');
    }
}
