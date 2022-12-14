<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id('id_lowongan');
            $table->integer('id_perusahaan');
            $table->string('statuslowongan');
            $table->string('tipe');
            $table->string('posisi');
            $table->text('jobdesk');
            $table->text('kualifikasi');
            $table->string('statustnk')->nullable();
            $table->text('benefit')->nullable();
            $table->string('skill');
            $table->string('pengalaman');
            $table->string('gaji')->nullable();
            $table->string('statusgaji')->nullable();
            $table->string('wawancara')->nullable();
            $table->string('waktu');
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
        Schema::dropIfExists('lowongans');
    }
};
