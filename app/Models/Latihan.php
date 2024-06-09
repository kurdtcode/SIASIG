<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latihan extends Model
{
    use HasFactory;

    protected $table = 'latihan';

    protected $fillable = [
        'task_id',
        'nama_latihan',
        'anggota',
        'absensi',
        'deskripsi',
    ];

    public function task()
    {
        return $this->belongsTo(ManageTask::class, 'task_id');
    }
}
