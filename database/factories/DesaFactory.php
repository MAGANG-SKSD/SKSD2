<?php

namespace Database\Factories;

use App\Models\Desa;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Desa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_desa' => $this->faker->word,
        'alamat_desa' => $this->faker->word,
        'kode_pos' => $this->faker->randomDigitNotNull,
        'telepon' => $this->faker->randomDigitNotNull,
        'email' => $this->faker->word
        ];
    }
}
