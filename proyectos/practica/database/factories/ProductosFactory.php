<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
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
        'descripcion' => fake()->paragraph(1),
        'cantidad'=> fake()->numberBetween(0,100),
        'precio' => fake()->randomFloat(2,0,100)
        ];
    }
}
