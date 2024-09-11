<?php

namespace Database\Factories;

use App\Models\Apbdes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApbdesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apbdes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => $this->faker->word,
        'tahun' => $this->faker->randomDigitNotNull,
        'pendapatan' => $this->faker->randomDigitNotNull,
        'belanja' => $this->faker->randomDigitNotNull,
        'pembiayaan' => $this->faker->randomDigitNotNull,
        'status_verifikasi' => $this->faker->word
        ];
    }
}
