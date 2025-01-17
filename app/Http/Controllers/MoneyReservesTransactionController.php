<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMoneyReservesTransactionRequest;
use App\Http\Requests\UpdateMoneyReservesTransactionRequest;
use App\Models\Category;
use App\Models\MoneyReserve;
use App\Models\MoneyReservesTransaction;
use Illuminate\Support\Facades\Auth;

class MoneyReservesTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user(); // Usuário autenticado
        $allMoneyReservesTransactions = MoneyReservesTransaction::whereHas('moneyReserve', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orderBy('created_at', 'desc')->get();

        return view('money-reserve-transaction.index', ['title' => 'Minhas Transações', 'allMoneyReservesTransactions' => $allMoneyReservesTransactions]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $moneyReserves = MoneyReserve::where('user_id', $user->id)->get();

        $categories = Category::all(); // Pega todas as categorias disponíveis

        return view('money-reserve-transaction.create', [
            'title' => 'Nova transação',
            'moneyReserves' => $moneyReserves,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoneyReservesTransactionRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(MoneyReservesTransaction $moneyReservesTransation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoneyReservesTransaction $moneyReservesTransation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMoneyReservesTransactionRequest $request, MoneyReservesTransaction $moneyReservesTransation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoneyReservesTransaction $moneyReservesTransation)
    {
        //
    }
}
