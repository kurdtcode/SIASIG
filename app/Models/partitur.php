<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partitur extends Model
{
    use HasFactory;

    protected $table = 'partitur';

    public $incrementing = true;

    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'pembuat_aransemen',
        'komposer',
        'genre_lagu',
        'link_youtube',
        'kebutuhan_instrumen',
        'tingkat_kesulitan',
        'kebutuhan_solo',
        'jenis_suara',
    ];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function partitur()
    {
        return $this->belongsTo(Partitur::class);
    }
}

