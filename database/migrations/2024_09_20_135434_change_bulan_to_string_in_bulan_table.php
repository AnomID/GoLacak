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
        $table->string('bulan')->change();  // Mengubah kolom bulan menjadi string
    });
}

public function down()
{
    Schema::table('bulan', function (Blueprint $table) {
        $table->date('bulan')->change();  // Mengembalikan tipe data ke date jika dibatalkan
    });
}
    
};
