<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Queue\Jobs\FakeJob;

use function PHPSTORM_META\type;

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
        'nombre' => fake()->name(),
        'descripcion' => fake()->words(10, true),
        'cantidad' => fake()->numberBetween(0,100),
        'precio' => fake()->randomFloat(2,0,100)
        ];
    }
}
