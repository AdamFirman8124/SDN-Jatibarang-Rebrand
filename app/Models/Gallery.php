<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
    ];

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }

    public function beritas()
    {
        return $this->hasMany(Berita::class, 'gallery_id', 'id');
    }
}
