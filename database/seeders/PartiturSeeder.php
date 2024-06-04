<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partitur;

class PartiturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Partitur::create([
            'judul' => 'Lagu Contoh',
            'pembuat_aransemen' => 'Jane Doe',
            'komposer' => 'John Smith',
            'genre_lagu' => 'Pop',
            'link_youtube' => 'https://youtube.com/example',
            'kebutuhan_instrumen' => 'Gitar',
            'tingkat_kesulitan' => 'Sedang',
            'kebutuhan_solo' => 'Ya',
            'jenis_suara' => 'SATB',
        ]);
    }
}
