<?php

namespace Database\Factories;

use App\Models\Sp2d;
use Illuminate\Database\Eloquent\Factories\Factory;

class Sp2dFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sp2d::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => $this->faker->word,
        'nomor_sp2d' => $this->faker->randomDigitNotNull,
        'tanggal_sp2d' => $this->faker->word,
        'jumlah_dana' => $this->faker->randomDigitNotNull
        ];
    }
}
