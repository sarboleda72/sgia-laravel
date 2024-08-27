<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tool>
 */
class ToolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nombre' => $this->faker->name(),
            'marca' => $this->faker->name(),
            'cantidad' => $this->faker->randomNumber(2),
            'precio' => $this->faker->randomNumber(5),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
        ];
    }
}
