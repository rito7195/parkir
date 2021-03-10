<?php

namespace Database\Factories;

use App\Models\KonfigurasiTarif;
use Illuminate\Database\Eloquent\Factories\Factory;

class KonfigurasiTarifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KonfigurasiTarif::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tarif_normal' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'tarif_inap' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'jam_inap' => $this->faker->randomNumber($nbDigits = 1, $strict = false),
        ];
    }
}
