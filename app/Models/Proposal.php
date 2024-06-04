<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    use HasFactory;

    protected $table = 'proposal';

    protected $fillable = [
        'judul_proposal',
        'deskripsi',
        'status',  // diterima, ditolak, dalam proses
        'tugas_id',
    ];

    // Relasi: Proposal milik satu Tugas
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }
}
