<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KonfigurasiKapasitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\KonfigurasiKapasitas::factory(1)->create();
    }
}
