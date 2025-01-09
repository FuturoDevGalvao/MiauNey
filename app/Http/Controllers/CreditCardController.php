<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use App\Models\CreditCard;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('credit-card.index', [
            'title' => 'Meus cartões de crédito'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request)
    {
        //        
        // Validar o campo `validity` no formato MM/YYYY
        $validated = $request->validate([
            'validity' => ['required', 'regex:/^(0[1-9]|1[0-2])\/\d{4}$/']
        ]);

        // Transformar para o formato "YYYY-MM-01"
        [$month, $year] = explode('/', $validated['validity']);
        $validityDate = "$year-$month-01";

        // Salvar no banco
        CreditCard::create([
            'name' => 'Cartão Teste',
            'institution' => 'Banco X',
            'validity' => $validityDate,
            'limit' => 5000
        ]);

        return redirect()->back()->with('success', 'Cartão salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditCard $creditCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CreditCard $creditCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCreditCardRequest $request, CreditCard $creditCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CreditCard $creditCard)
    {
        //
    }
}
