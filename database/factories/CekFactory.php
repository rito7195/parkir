<?php

namespace Database\Factories;

use App\Models\Cek;
use Illuminate\Database\Eloquent\Factories\Factory;

class CekFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cek::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jumlah' => $this->faker->randomNumber($nbDigits = 4, $strict = false),
        ];
    }
}
