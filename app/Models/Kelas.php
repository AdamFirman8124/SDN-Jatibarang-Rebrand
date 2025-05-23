<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'nama',
        'staff_id',
    ];

    // Relasi ke model Staff (Guru Wali Kelas)
    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }

    public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
