<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Pastikan nama tabel adalah 'anggota'
    protected $table = 'anggota';

    protected $primaryKey = 'NRP';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;
    protected $fillable = [
        'NRP',
        'name',
        'email',
        'role',
        'jenis_suara',
    ];
}

