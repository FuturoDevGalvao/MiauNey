<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoneyReserve>
 */
class MoneyReserveFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'goal' => $this->faker->numberBetween(500, 5000),
            'amount_achieved' => $this->faker->numberBetween(0, 5000),
            'goal_achieved' => false,
            'image_path' => null,
            'user_id' => null, // Relaciona automaticamente a um usuário
        ];
    }
}
