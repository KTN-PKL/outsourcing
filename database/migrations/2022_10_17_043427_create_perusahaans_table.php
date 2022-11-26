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
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id('id_perusahaan');
            $table->string('logo');
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('alamat');
            $table->string('website');
            $table->string('industri');
            $table->string('ukuran');
            $table->string('ktp')->nullable();
            $table->string('nib')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pkp')->nullable();
            $table->string('fotodepan')->nullable();
            $table->string('fotobelakang')->nullable();
            $table->string('fotokiri')->nullable();
            $table->string('fotokanan')->nullable();
            $table->string('fotodalam')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('perusahaans');
    }
};
