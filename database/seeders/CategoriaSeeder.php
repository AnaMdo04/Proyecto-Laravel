<?php
// database/seeders/CategoriaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Categoria::factory(10)->create();
    }
}
