<?php

namespace Database\Seeders;

use App\Models\Estudiantes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudiantesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Estudiantes::factory()->count(5)->create();
    }
}
