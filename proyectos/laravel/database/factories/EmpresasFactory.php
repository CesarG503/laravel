<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresas>
 */
class EmpresasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'nombre' => fake()->name,
                'nit' => fake()->randomNumber(2),
               'descripcion' => fake()->paragraph(1),
                'plantas'=> fake()->numberBetween(1,10)
        ];
    }
}
