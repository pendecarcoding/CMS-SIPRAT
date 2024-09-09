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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Kolom judul
            $table->unsignedBigInteger('id_koperasi'); // Kolom id_koperasi dengan tipe unsignedBigInteger
            $table->date('tanggal'); // Kolom tanggal
            $table->string('file'); // Kolom file, sesuaikan dengan tipe data jika perlu
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('id_koperasi')
                  ->references('id')->on('koperasis')
                  ->onDelete('cascade'); // Opsional: tambahkan tindakan pada saat record di tabel 'koperasis' dihapus
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
