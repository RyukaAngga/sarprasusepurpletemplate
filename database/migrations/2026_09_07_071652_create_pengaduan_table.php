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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id('id_pengaduan');

            $table->unsignedBigInteger('id_user');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('id_sarana');

            $table->foreign('id_sarana')
                ->references('id_sarana')
                ->on('sarana_prasarana')
                ->cascadeOnDelete();

            $table->date('tanggal_pengaduan');
            $table->text('deskripsi');

            $table->enum('status', [
                'Menunggu',
                'Diproses',
                'Selesai',
                'Ditolak'
            ])->default('Menunggu');

            $table->text('keterangan_perbaikan')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
         Schema::dropIfExists('pengaduan');
    }
};
