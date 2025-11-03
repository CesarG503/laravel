<?php

namespace Database\Factories;

use App\Models\Empresas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleados>
 */
class EmpleadosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nombre'=> fake()->name(),
        'edad' => fake()->numberBetween(0,100),
        'dui'=> fake()->numerify('########-#'),
        'paiz'=> fake()->country(),
        'numero' => fake()->phoneNumber(),
        'id_empresa'=> Empresas::factory()
        ];
    }
}
