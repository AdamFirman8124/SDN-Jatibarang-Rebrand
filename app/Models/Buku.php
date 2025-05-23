<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun_terbit',
        'kategori',
        'jumlah',
        'deskripsi'
    ];

    /**
     * Relasi ke model Gallery.
     */
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id', 'id');
    }

    /**
     * Relasi ke model Kelas.
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
