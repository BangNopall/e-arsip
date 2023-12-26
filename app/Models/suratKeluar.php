<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'nama_pengirim',
        'tanggal_surat',
        'nama_penerima',
        'isi_surat',
        'penanggungjawab',
    ];
    public function dokumenSuratKeluar()
    {
        return $this->hasMany(dokumenSuratKeluar::class);
    }
}
