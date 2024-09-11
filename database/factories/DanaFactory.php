<?php

namespace Database\Factories;

use App\Models\Dana;
use Illuminate\Database\Eloquent\Factories\Factory;

class DanaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dana::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'desa_id' => $this->faker->word,
        'jenis_dana' => $this->faker->randomDigitNotNull,
        'jumlah_dana' => $this->faker->randomDigitNotNull,
        'status_pengajuan' => $this->faker->word
        ];
    }
}
