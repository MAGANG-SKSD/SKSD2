<?php

namespace Database\Factories;

use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokumenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dokumen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dana_id' => $this->faker->word,
        'jenis_dokumen' => $this->faker->word,
        'file_path' => $this->faker->word,
        'status_verifikasi' => $this->faker->word
        ];
    }
}
