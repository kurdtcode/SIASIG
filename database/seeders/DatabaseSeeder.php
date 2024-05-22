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
            'judul' => 'Ave Maria',
            'pembuat_aransemen' => 'Franz Biebl',
            'komposer' => 'Franz Biebl',
            'genre_lagu' => 'Religi',
            'link_youtube' => 'https://www.youtube.com/watch?v=0Kvbj_i9D6A',
            'kebutuhan_instrumen' => 'Piano',
            'tingkat_kesulitan' => 'Sulit',
            'kebutuhan_solo' => true,
            'jenis_suara' => 'SATB'
        ]);

    }
}
