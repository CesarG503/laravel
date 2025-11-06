<?php

namespace Database\Factories;

use App\Models\Materias;
use App\Models\Notas;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Estudiantes>
 */
class EstudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $materias = Materias::all();
        $notas = Notas::all();

        return [
        "nombre" => fake()->name(),
        "apellido" => fake()->lastName(),
        "id_materia" => $materias->random()->id,
        "id_notas" => $notas->random()->id
        ];
    }
}
