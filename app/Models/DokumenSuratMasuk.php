<?php

namespace App\Models;

use App\Models\suratMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DokumenSuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_masuk_id',
        'nama_file',
        'path',
    ];
    public function suratMasuk()
    {
        return $this->belongsTo(suratMasuk::class);
    }
}
