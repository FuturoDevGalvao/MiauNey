<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMoneyReserveRequest;
use App\Http\Requests\UpdateMoneyReserveRequest;
use App\Models\MoneyReserve;

class MoneyReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('money-reserve.index', ['title' => 'Minhas reservas de dinheiro']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('money-reserve.create', ['title' => 'Nova reserva de dinheiro']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoneyReserveRequest $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(MoneyReserve $moneyReserve)
    {
        return view('money-reserve.show', ['title' => 'Minhas reservas']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoneyReserve $moneyReserve)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMoneyReserveRequest $request, MoneyReserve $moneyReserve)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoneyReserve $moneyReserve)
    {
        //
    }
}
