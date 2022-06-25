<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJenisIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_identitas', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_identitas');
            $table->biginteger('id_jenis_pemohon')->unsigned();
            $table->timestamps();
            $table->foreign('id_jenis_pemohon')->references('id')->on('jenis_pemohon')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_identitas');
    }
}
