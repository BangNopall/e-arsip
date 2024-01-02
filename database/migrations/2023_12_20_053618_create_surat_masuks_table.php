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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('perihal');
            $table->string('nama_pengirim');
            $table->string('no_registrasi');
            $table->date('tanggal_surat');
            $table->date('tanggal_terima');
            $table->string('lampiran');
            $table->string('alamat_asal');
            $table->string('alamat_sekarang');
            $table->string('nama_penerima');
            $table->bigInteger('is_rapat')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
