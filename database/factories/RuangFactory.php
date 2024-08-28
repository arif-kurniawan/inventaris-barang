<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ruang>
 */
class RuangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_ruang' => $this->faker->firstName(),
            'panjang'=>$this->faker->numberBetween(100, 2000),
            'lebar'=>$this->faker->numberBetween(100, 2000),
            'keterangan'=>$this->faker->word(),
        ];
    }
}
