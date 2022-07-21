<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermintaanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaan_users', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user_minta');
            $table->integer('mendapatkan');
            $table->integer('memperoleh');
            $table->integer('ppid_tujuan');
            $table->string('isi');
            $table->string('tujuan');
            $table->string('dokumen');
            $table->string('pendukung');
            $table->integer('dikuasakan')->default(0);
            $table->string('nama_kuasa')->nullable();
            $table->string('nik_kuasa')->nullable();
            $table->string('kontak_kuasa')->nullable();
            $table->text('alamat_kuasa')->nullable();
            $table->string('doc_kuasa')->nullable();
            $table->string('identitas_kuasa')->nullable();
            $table->string('noreg');
            $table->date('jatuh_tempo')->nullable();
            $table->integer('status')->default(0);
            $table->date('tgl_kirim')->nullable();
            $table->integer('lama')->nullable();
            $table->string('file_tertulis')->nullable();
            $table->string('alasan')->nullable();
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
        Schema::dropIfExists('permintaan_users');
    }
}
