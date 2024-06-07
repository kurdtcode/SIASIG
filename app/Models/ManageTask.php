<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManageTask extends Model
{
    protected $table = 'manage_task';

    protected $fillable = [
        'nama_kegiatan',
        'jenis_kegiatan',
        'waktu',
        'list_id_anggota',
        'list_id_partitur',
        'list_id_latihan',
    ];

    protected $casts = [
        'waktu' => 'datetime',
        'list_id_anggota' => 'array',
        'list_id_partitur' => 'array',
        'list_id_latihan' => 'array',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    // Relasi: Latihan milik satu Anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function partitur()
    {
        return $this->belongsTo(Partitur::class);
    }

}

