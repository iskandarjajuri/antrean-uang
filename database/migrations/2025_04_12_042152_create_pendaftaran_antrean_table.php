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
    Schema::create('pendaftaran_antrean', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pegawai_id')->constrained('pegawai')->onDelete('cascade');
        $table->integer('nomor_antrean');
        $table->date('tanggal_daftar');
        $table->date('tanggal_penukaran');
        $table->string('bukti_pdf')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_antrean');
    }
};
