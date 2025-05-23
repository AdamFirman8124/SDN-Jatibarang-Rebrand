<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'tanggal',
        'deskripsi',
        'tempat',
        'lokasi',
        'penanggung_jawab'
    ];

    /**
     * Relasi ke model Gallery.
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
