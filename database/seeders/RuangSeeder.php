<?php

namespace Database\Seeders;

use App\Models\Gedung;
use App\Models\Ruang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Gedung = Gedung::all();
        foreach ($Gedung as $gedungs)
        Ruang::factory()->count(5)->create(['gedung_id' => $gedungs->id]);
    }
}
