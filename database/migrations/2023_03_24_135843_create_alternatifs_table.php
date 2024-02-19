<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemohon_id')->references('id')->on('pemohons')->onDelete('cascade');
            $table->foreignId('kriteria_id')->references('id')->on('kriterias')->onDelete('cascade');
            $table->foreignId('id_periode')->references('id')->on('periodes')->onDelete('cascade');
            $table->foreignId('nilai_id')->references('id')->on('nilais')->onDelete('cascade');
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
        Schema::dropIfExists('alternatifs');
    }
}
