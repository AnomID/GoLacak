<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
    Schema::table('bulan', function (Blueprint $table) {
        $table->string('create_by')->nullable();
        $table->string('update_by')->nullable();
    });

    Schema::table('program', function (Blueprint $table) {
        $table->string('create_by')->nullable();
        $table->string('update_by')->nullable();
    });

    Schema::table('kegiatan', function (Blueprint $table) {
        $table->string('create_by')->nullable();
        $table->string('update_by')->nullable();
    });

    Schema::table('sub_kegiatan', function (Blueprint $table) {
        $table->string('create_by')->nullable();
        $table->string('update_by')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     */

    public function down()
    {
    Schema::table('bulan', function (Blueprint $table) {
        $table->dropColumn(['create_by', 'update_by']);
    });

    Schema::table('program', function (Blueprint $table) {
        $table->dropColumn(['create_by', 'update_by']);
    });

    Schema::table('kegiatan', function (Blueprint $table) {
        $table->dropColumn(['create_by', 'update_by']);
    });

    Schema::table('sub_kegiatan', function (Blueprint $table) {
        $table->dropColumn(['create_by', 'update_by']);
    });
    }
};
