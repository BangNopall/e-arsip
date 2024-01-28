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
            $table->string('perihal')->nullable();
            $table->string('nama_pengirim')->nullable();
            $table->string('no_registrasi')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->date('tanggal_terima')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('alamat_asal')->nullable();
            $table->string('alamat_sekarang')->nullable();
            $table->string('nama_penerima')->nullable();
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
