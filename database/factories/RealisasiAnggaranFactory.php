<?php

namespace Database\Factories;

use App\Models\RealisasiAnggaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealisasiAnggaranFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RealisasiAnggaran::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => $this->faker->word,
        'tahun' => $this->faker->word,
        'belanja_realisasi' => $this->faker->randomDigitNotNull,
        'dana_tidak_terpakai' => $this->faker->randomDigitNotNull,
        'laporan' => $this->faker->word
        ];
    }
}
