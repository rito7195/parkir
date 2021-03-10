<?php

namespace Database\Factories;

use App\Models\Parkir;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParkirFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parkir::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plat_nomor' => $this->faker->word(),
            'tgl_parkir' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'jam_masuk' => $this->faker->date($format = 'Y-m-d H:i:s'),
            'tagihan' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        ];
    }
}
