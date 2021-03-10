<?php

namespace Database\Factories;

use App\Models\JenisKendaraan;
use Illuminate\Database\Eloquent\Factories\Factory;

class JenisKendaraanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JenisKendaraan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->firstName(),
        ];
    }
}
