<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CreditCardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoneyReserveController;
use App\Http\Controllers\MoneyReservesTransactionController;
use App\Http\Controllers\UserController;
use App\Models\MoneyReserve;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Pest\Arch\Support\UserDefinedFunctions;

/*  
Alimentação
Transporte
Lazer
Saúde
Educação
Moradia
Contas e Serviços (ex.: energia, água, internet)
Investimentos
Dívidas (ex.: pagamento de empréstimos ou financiamentos)
Outros
*/


/* 
1. Usar Duas Tabelas de Transações
Criar uma tabela para transações das reservas (reserve_transactions) e outra para transações de linhas de crédito (credit_card_transactions).

Vantagens
Separação clara: Fica fácil entender e gerenciar as diferenças entre os dois tipos de transações.
Regra de negócio simplificada: Cada tabela lida apenas com as regras específicas do seu contexto (ex.: limite para cartões de crédito ou saldo para reservas).
Facilidade de expansão: Se futuramente forem necessárias funcionalidades específicas para cada tipo de transação, é mais fácil expandir sem criar muita complexidade.
Desvantagens
Estrutura duplicada: Como ambas as tabelas possuem campos semelhantes, haverá duplicidade no esquema do banco de dados.
Consultas integradas mais complicadas: Relatórios financeiros que exigem dados das duas tabelas podem ser mais complexos de implementar.
Estrutura

Tabela: reserve_transactions
id (PK)
reserve_id (FK - referência à reserva de dinheiro)
type (income ou expense)
amount
description
category (ex.: "Alimentação", "Lazer")
date
created_at, updated_at

Tabela: credit_card_transactions
id (PK)
credit_card_id (FK - referência ao cartão de crédito)
amount
description
category
date
status (pending ou paid)
created_at, updated_at
 */


Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome', [
            'title' => 'Seja Bem-vindo!',
            'moneyReserves' => $reserves = MoneyReserve::where('user_id', Auth::user()->id)
                ->orderBy('created_at', 'desc') // Ordena pela data de criação (mais recentes primeiro)
                ->take(5)
                ->get()
        ]);
    })->name('root');

    Route::get('/login/logout', [LoginController::class, 'logout'])->name('login.logout');

    Route::resource('credit-cards', CreditCardController::class);

    Route::resource('money-reserves', MoneyReserveController::class)
        ->parameters(['money-reserves' => 'money_reserve']);

    Route::resource('money-reserves-transactions', MoneyReservesTransactionController::class)
        ->parameters(['money-reserves-transactions' => 'money-reserve-transaction']);

    Route::resource('users', UserController::class);

    Route::resource('dashboard', DashboardController::class)->only(['index']);
});

Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'login')->name('login');
        Route::post('/login/auth', 'auth')->name('login.auth');
    });

    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'register')->name('register.register');
        Route::post('/register/store', 'store')->name('register.store');
    });
});
