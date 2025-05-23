<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal',
        'kategori',
        'penulis',
        'deskripsi',
        'gallery_id'
    ];

    protected $dates = ['tanggal'];

        public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }
}
