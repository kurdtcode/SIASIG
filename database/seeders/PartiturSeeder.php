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
            'judul' => 'Title 1',
            'pembuat_aransemen' => 'Arranger 1',
            'komposer' => 'Composer 1',
            'genre_lagu' => 'Genre 1',
            'link_youtube' => 'https://youtube.com/...',
            'kebutuhan_instrumen' => 'Instrument 1',
            'tingkat_kesulitan' => 'Difficulty 1',
            'kebutuhan_solo' => 'Solo 1',
            'jenis_suara' => 'Voice Type 1',
        ]);
    }
}
