<?php

namespace Database\Seeders;

use App\Models\Materias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MateriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Materias::factory()->count(5)->create();
    }
}
