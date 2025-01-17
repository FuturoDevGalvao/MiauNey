<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CreditCard;
use App\Models\Invoice;
use App\Models\MoneyReserve;
use App\Models\Category;
use App\Models\MoneyReservesTransaction;

class MainSeeder extends Seeder
{
    public function run()
    {
        // Cria 2 usuários
        $users = User::factory(2)->create();

        // Para cada usuário, crie cartões, faturas e reservas de dinheiro
        foreach ($users as $user) {
            // Cria 2 cartões para cada usuário
            $creditCards = CreditCard::factory(2)->create([
                'user_id' => $user->id,
            ]);

            // Para cada cartão, cria 1 fatura
            foreach ($creditCards as $card) {
                Invoice::factory()->create([
                    'credit_card_id' => $card->id,
                ]);
            }

            // Cria 3 reservas de dinheiro para cada usuário
            $moneyReserves = MoneyReserve::factory(3)->create([
                'user_id' => $user->id,
            ]);

            // Para cada reserva de dinheiro, cria 2 transações
            foreach ($moneyReserves as $reserve) {
                MoneyReservesTransaction::factory(2)->create([
                    'money_reserve_id' => $reserve->id,
                ]);
            }
        }

        // Cria 5 categorias globais (compartilhadas por todos)
        $categories = Category::factory(5)->create();

        // Associa categorias a transações
        MoneyReservesTransaction::all()->each(function ($transaction) use ($categories) {
            // Relaciona 2 categorias aleatórias com cada transação
            $transaction->categories()->attach(
                $categories->random(2)->pluck('id')->toArray()
            );
        });
    }
}
