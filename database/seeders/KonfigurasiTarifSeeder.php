<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KonfigurasiTarifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\KonfigurasiTarif::factory(1)->create();
    }
}
