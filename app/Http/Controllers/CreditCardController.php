<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCreditCardRequest;
use App\Http\Requests\UpdateCreditCardRequest;
use App\Models\CreditCard;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('credit-card.index', [
            'title' => 'Meus cartões de crédito',
            'allCreditCards' => CreditCard::where('user_id', Auth::user()->id)->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('credit-card.create', [
            'title' => 'Novo cartão de crédito',
            'successOnCreate' => session()->get('successOnCreate'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCreditCardRequest $request)
    {
        $newCreditCardData = $request->validated();
        $sessionData = ['successOnCreate' => false];
        $newCreditCardData['user_id'] = Auth::user()->id;

        DB::beginTransaction();

        try {
            $creditCard = CreditCard::create($newCreditCardData);

            $newInvoiceData = [];
            $newInvoiceData['limit'] = $creditCard->limit;
            $newInvoiceData['credit_card_id'] = $creditCard->id;
            $newInvoiceData['due_date'] = $newCreditCardData['due_date'];

            $invoice = Invoice::create($newInvoiceData);

            if ($creditCard and $invoice) {
                DB::commit();
                $sessionData['successOnCreate'] = true;
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with($sessionData);
        }

        return back()->with($sessionData);
    }

    /**
     * Display the specified resource.
     */
    public function show(CreditCard $creditCard)
    {
        return view('credit-card.show', [
            'title' => 'Cartão' . $creditCard->name,
            'creditCard' => $creditCard
        ]);
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
