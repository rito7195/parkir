<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_admin' => $this->faker->firstName(),
            'email' => $this->faker->unique()->safeEmail,
            'username' => $this->faker->word(),
            'password' => $this->faker->password(),
        ];
    }
}
