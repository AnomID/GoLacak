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
        Schema::create('sub_kegiatan', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(Str::uuid());
            $table->string('nama_sub_kegiatan');
            $table->string('nama_indikator');
            $table->integer('jumlah_indikator');
            $table->string('tipe_indikator');
            $table->bigInteger('anggaran_murni');
            $table->bigInteger('pergeseran');
            $table->bigInteger('perubahan');
            $table->bigInteger('penyerapan_anggaran');
            $table->bigInteger('persen_penyerapan_anggaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('sub_kegiatan');
    }
};
