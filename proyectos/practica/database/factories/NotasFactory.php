<?php

namespace Database\Factories;

use App\Models\Materias;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notas>
 */
class NotasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "notas" => fake()->numberBetween(0,10),
            "id_materia" => Materias::factory()
        ];
    }
}
