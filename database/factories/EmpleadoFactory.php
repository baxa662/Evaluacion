<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellido' => $this->faker->lastName(),
            'correo' => $this->faker->unique()->safeEmail(),
            'salario' => $this->faker->numberBetween(500,1500),
            'puesto' => $this->faker->jobTitle(),
            'estatus' => $this->faker->boolean(),
        ];
    }
}
