<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\JenisKendaraan::factory(1)->create();
    }
}
