<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokumenSuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_masuk_id',
        'nama_file',
        'path',
    ];
    public function suratkeluar()
    {
        return $this->belongsTo(suratKeluar::class);
    }
}
