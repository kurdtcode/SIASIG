<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi'; // Specify the correct table name
    protected $fillable = ['anggota_id', 'latihan_id', 'status'];
}
