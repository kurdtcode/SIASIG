<?php

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
            'judul' => 'Example Title',
            'pembuat_aransemen' => 'Composer Name',
            'komposer' => 'Composer Name',
            'genre_lagu' => 'Genre',
            'link_youtube' => 'https://youtube.com/example',
            'kebutuhan_instrumen' => 'Instrument Needs',
            'tingkat_kesulitan' => 'Difficulty Level',
            'kebutuhan_solo' => 'Solo Needs',
            'jenis_suara' => 'SATB',
        ]);
    }
}
