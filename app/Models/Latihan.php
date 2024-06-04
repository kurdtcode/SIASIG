<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihan';

    protected $fillable = [
        'nama_latihan',
        'waktu',
        'tugas_id',
        'anggota_id',
    ];

    // Relasi: Latihan milik satu Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    // Relasi: Latihan milik satu Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
