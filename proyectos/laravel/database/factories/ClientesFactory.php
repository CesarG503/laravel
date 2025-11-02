<?php

namespace Database\Factories;

use App\Models\Empresas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClientesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        "nombre" => fake()->name,
        "apellido" => fake()->lastName(),
        "edad" => fake()->numberBetween(0,100),
        "id_empresa" => Empresas::factory()
        ];
    }
}
