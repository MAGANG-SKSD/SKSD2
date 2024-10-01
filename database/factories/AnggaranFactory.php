<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnggaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(), // ID harus unik
            'tahun' => $this->faker->year(), // Menghasilkan tahun
            'detail_norekening_id' => $this->faker->randomNumber(), // Ganti dengan yang sesuai
            'keterangan_lainnya' => $this->faker->sentence(), // Ganti dengan yang sesuai
            'nilai_anggaran' => $this->faker->randomFloat(2, 1000, 100000), // Misal, nilai anggaran
            'verifikasi' => $this->faker->randomElement([0, 1]),
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
