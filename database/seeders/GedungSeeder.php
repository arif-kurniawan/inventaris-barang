<?php

namespace Database\Seeders;

use App\Models\Gedung;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GedungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gedung::create([
            'nama_gedung' => 'Gedung A',
            'lokasi' => 'Utara',
            'luas' => 1000,
        ]);

        Gedung::create([
            'nama_gedung' => 'Gedung B',
            'lokasi' => 'Barat',
            'luas' => 2000,
        ]);

    }
}
