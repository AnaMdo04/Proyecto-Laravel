<?php
// database/seeders/FabricanteSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FabricanteSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Fabricante::factory(5)->create();
    }
}
