<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggota;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = new Anggota();
        dd($anggota->getTable()); // Debugging untuk mengecek nama tabel

        Anggota::create([
            'NRP' => '123456',
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'member',
            'jenis_suara' => 'SATB',
        ]);
    }
}
