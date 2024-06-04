<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',  // pelayanan, lomba, kegiatan internal
        'waktu',
        'anggota_id',
    ];

    // Relasi: Tugas milik satu Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
