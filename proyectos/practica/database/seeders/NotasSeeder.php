<?php

namespace Database\Seeders;

use App\Models\Notas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notas::factory()->count(5)->create();
    }
}
