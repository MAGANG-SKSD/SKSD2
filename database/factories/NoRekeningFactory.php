<?php

namespace Database\Factories;

use App\Models\NoRekening;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoRekeningFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NoRekening::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => $this->faker->word,
        'kode_rekening' => $this->faker->randomDigitNotNull,
        'uraian' => $this->faker->word
        ];
    }
}
