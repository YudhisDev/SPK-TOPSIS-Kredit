<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->foreignId('id_pemohon')->references('id')->on('pemohons')->onDelete('cascade');
            $table->integer('pinjaman');
            $table->integer('gaji_kotor');
            $table->integer('usaha');
            $table->integer('rumah_tangga');
            $table->integer('lain_lain');
            $table->integer('simpanan_wajib')->nullable();
            $table->decimal('bunga', 8, 2);
            $table->integer('waktu');
            $table->string('kurung_waktu');
            $table->date('tgl_pengajuan');
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
        Schema::dropIfExists('pinjamen');
    }
}
