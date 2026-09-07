<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
      {
        Schema::create('sarana_prasarana', function (Blueprint $table) {
            $table->id('id_sarana');
            $table->string('nama_sarana', 100);
            $table->string('lokasi', 100);
            $table->string('kondisi', 50);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarana_prasarana');
    }
};
