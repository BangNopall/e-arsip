<?php

namespace App\Models;

use App\Models\DokumenSuratMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengirim',
        'nomor_registrasi',
        'tanggal_surat',
        'tanggal_diterima',
        'lampiran',
        'alamat_asal',
        'alamat_sekarang',
        'foto',
        'nama_penerima',
    ];
    public function dokumenSuratMasuk()
    {
        return $this->hasMany(DokumenSuratMasuk::class);
    }
}
