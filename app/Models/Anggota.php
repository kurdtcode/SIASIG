<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Pastikan nama tabel adalah 'anggota'
    protected $table = 'anggota';

    public $incrementing = true;

    protected $keyType = 'int';

    public $timestamps = true;
    protected $fillable = [
        'NRP',
        'name',
        'email',
        'role',
        'jenis_suara',
        'list_id_partitur',
        'list_id_task',
        'list_id_latihan',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function partitur()
    {
        return $this->belongsTo(Partitur::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
}

