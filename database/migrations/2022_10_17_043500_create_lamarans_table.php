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
        Schema::create('lamarans', function (Blueprint $table) {
            $table->id('id_lamaran');
            $table->integer('id_perusahaan');
            $table->integer('id_lowongan');
            $table->integer('id_user');
            $table->text('resume');
            $table->string('no_telp');
            $table->string('status')->nullable();
            $table->string('jadwal')->nullable();
            $table->string('statusjadwal')->nullable();
            $table->string('tipewawancara')->nullable();
            $table->string('linkwawancara')->nullable();
            $table->string('notifstatus')->nullable();
            $table->string('notifwawancara')->nullable();
            $table->string('alamatwawancara')->nullable();
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
        Schema::dropIfExists('lamarans');
    }
};
