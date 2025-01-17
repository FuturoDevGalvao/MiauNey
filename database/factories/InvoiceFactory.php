<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => $this->faker->randomFloat(2, 0, 1000),
            'limit' => $this->faker->numberBetween(1000, 5000),
            'due_date' => $this->faker->regexify('[0-3][0-9]/[0-1][0-9]'), // Ex: 15/08
            'paid' => $this->faker->boolean(),
            'credit_card_id' => null, // Relaciona automaticamente a um cartão
        ];
    }
}
