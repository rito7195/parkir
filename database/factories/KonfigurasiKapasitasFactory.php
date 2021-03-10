<?php

namespace Database\Factories;

use App\Models\KonfigurasiKapasitas;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonfigurasiKapasitasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KonfigurasiKapasitas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kapasitas' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
        ];
    }
}
