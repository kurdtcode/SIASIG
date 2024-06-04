<?php
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
        Anggota::create([
            'NRP' => '123456',
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role' => 'member',
            'jenis_suara' => 'SATB',
        ]);
    }
}
