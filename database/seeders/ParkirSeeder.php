<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ParkirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Parkir::factory(5)->create();
    }
}
