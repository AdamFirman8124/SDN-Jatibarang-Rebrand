<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff'; // Nama tabel

    protected $fillable = [
        'NIP',
        'nama',
        'jabatan',
        'pekerjaan',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
}
