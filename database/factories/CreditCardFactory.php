<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CreditCard>
 */
class CreditCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->creditCardType(),
            'institution' => $this->faker->company(),
            'validity' => $this->faker->regexify('[0-1][0-9]/[0-9]{2}'), // Ex: 12/25
            'limit' => $this->faker->numberBetween(1000, 5000),
            'color' => $this->faker->hexColor(),
            'user_id' => null, // Relaciona automaticamente a um usuário
        ];
    }
}
