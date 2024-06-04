<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Pastikan nama tabel adalah 'anggota'
    protected $table = 'anggota';

    protected $fillable = [
        'NRP',
        'name',
        'email',
        'role',
        'jenis_suara',
    ];
}
