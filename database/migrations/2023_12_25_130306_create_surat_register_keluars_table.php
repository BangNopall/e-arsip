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
        Schema::create('surat_register_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('tanggal_lahir');
            $table->string('status');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('alamat_asal');
            $table->string('alamat_pindah');
            $table->string('tanggal_surat');
            $table->string('keterangan');
            $table->string('penanggung_jawab');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_register_keluars');
    }
};
