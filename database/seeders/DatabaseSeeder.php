<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editorial;
use App\Models\Autor;
use App\Models\Socio;
use App\Models\Libro;
use App\Models\Prestamo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Editorial::factory(5)->create();
        \App\Models\Autor::factory(17)->create();
        \App\Models\Socio::factory(30)->create();
        \App\Models\Libro::factory(50)->create();
        \App\Models\Prestamo::factory(70)->create();

    }
}
