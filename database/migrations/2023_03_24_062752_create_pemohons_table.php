<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemohonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemohons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('nama');
            $table->string('no_ktp')->unique();
            $table->string('no_hp')->nullable();
            $table->string('nama_pasangan')->nullable();
            $table->string('nama_ibu');
            $table->string('status_nasabah');
            $table->string('alamat_rumah');
            $table->string('jenis_usaha');
            $table->string('lama_usaha')->nullable();
            $table->string('lokasi_usaha')->nullable();
            $table->string('lama_menetap')->nullable();
            $table->string('keperluan');
            $table->date('tgl_pengajuan');
            $table->string('imgrumah')->nullable();
            $table->string('imgnasabah')->nullable();
            $table->string('imgjaminan')->nullable();
            $table->string('imgktp')->nullable();
            $table->string('imgkk')->nullable();
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
        Schema::dropIfExists('pemohons');
    }
}
