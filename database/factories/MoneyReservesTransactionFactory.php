<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoneyReservesTransation>
 */

class MoneyReservesTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'value' => $this->faker->randomFloat(2, 10, 500),
            'operation' => $this->faker->randomElement(['input', 'output']),
            'money_reserve_id' => null, // Relaciona automaticamente a uma reserva
        ];
    }
}
