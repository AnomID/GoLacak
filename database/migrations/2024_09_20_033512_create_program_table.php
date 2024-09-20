<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('program', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->string('nama_program');
            $table->string('nama_indikator');
            $table->integer('jumlah_indikator');
            $table->string('tipe_indikator');
            $table->bigInteger('anggaran_murni');
            $table->bigInteger('pergeseran');
            $table->bigInteger('perubahan');
            $table->bigInteger('penyerapan_anggaran');
            $table->bigInteger('persen_penyerapan_anggaran');
            $table->uuid('kegiatan_id');
            $table->uuid('bulan_id');
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('kegiatan_id')->references('id')->on('kegiatan')->onDelete('cascade');
            $table->foreign('bulan_id')->references('id')->on('bulan')->onDelete('cascade');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('program');
    }
};
