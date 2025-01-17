<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\MoneyReservesTransaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MoneyReservesTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar um usuário válido
        $user = User::create([
            'name' => 'João Silva',
            'email' => 'joao.silva@example.com',
            'phone' => '(84) 996101005',
            'profile_image_path' => '#',
            'banner_image_path' => '#',
            'password' => bcrypt('senha123'), // Crie uma senha válida para o usuário
        ]);

        // Criar uma reserva de dinheiro válida
        $moneyReserve = \App\Models\MoneyReserve::create([
            'name' => 'Reserva de Emergência',
            'goal' => 1000.00,
            'description' => 'Reserva destinada a emergências financeiras.',
            'image_path' => 'path/to/image.jpg', // Forneça um caminho válido de imagem
            'user_id' => $user->id, // Associando a reserva ao usuário criado
        ]);

        // Criar as categorias
        $category1 = Category::create(['name' => 'Alimentação', 'color' => 'green']);
        $category2 = Category::create(['name' => 'Transporte', 'color' => 'blue']);
        $category3 = Category::create(['name' => 'Saúde', 'color' => 'red']);
        $category4 = Category::create(['name' => 'Educação', 'color' => 'yellow']);

        // Criar as transações de reserva de dinheiro
        $transaction1 = MoneyReservesTransaction::create([
            'title' => 'Compra do supermercado',
            'description' => 'Compra de alimentos e produtos de limpeza',
            'value' => 200.50,
            'operation' => 'output', // operação de saída
            'money_reserve_id' => $moneyReserve->id, // Usando o ID da reserva de dinheiro criada
        ]);

        $transaction2 = MoneyReservesTransaction::create([
            'title' => 'Compra de passagem',
            'description' => 'Passagem para viagem',
            'value' => 150.75,
            'operation' => 'output', // operação de saída
            'money_reserve_id' => $moneyReserve->id, // Usando o ID da reserva de dinheiro criada
        ]);

        // Associar categorias às transações usando a tabela pivot
        $transaction1->categories()->attach([$category1->id, $category2->id]);
        $transaction2->categories()->attach([$category3->id, $category4->id]);
    }
}
