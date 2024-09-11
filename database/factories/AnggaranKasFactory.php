<?php

namespace Database\Factories;

use App\Models\AnggaranKas;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnggaranKasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AnggaranKas::class;

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
        'total_anggaran' => $this->faker->randomDigitNotNull,
        'status persetujuan' => $this->faker->word
        ];
    }
}
