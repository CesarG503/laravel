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
        'nombre' => fake()->company(),
        'descripcion' => fake()->sentence(10),
        'nit'=> fake()->numerify('#########-#'),
        'postal'=> fake()->numberBetween(1000,9999)
        ];
    }
}
