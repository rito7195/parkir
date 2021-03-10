<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cek::factory(2)->create();
    }
}
