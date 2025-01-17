<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Helpers\RouteHelper;
use App\Http\Requests\StoreMoneyReserveRequest;
use App\Http\Requests\UpdateMoneyReserveRequest;
use App\Models\MoneyReserve;
use App\Models\MoneyReservesTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MoneyReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('money-reserve.index', [
            'title' => 'Minhas reservas de dinheiro',
            'allMoneyReserves' => MoneyReserve::where('user_id', Auth::user()->id)->paginate(3),
            'successOnDelete' => session()->get('successOnDelete'),
            'nameOfReserveDeleted' => session()->get('nameOfReserveDeleted')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('money-reserve.create', [
            'title' => 'Nova reserva de dinheiro',
            'successOnCreate' => session()->get('successOnCreate'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMoneyReserveRequest $request)
    {
        $validatedData = $request->validated();
        $sessionData = ['successOnCreate' => false];
        $validatedData['user_id'] = Auth::user()->id;

        if (isset($validatedData['image'])) {
            $imagePath = ImageHelper::saveImage($validatedData['image']);
            $validatedData['image_path'] = $imagePath;
        }

        // Criação do registro e captura da instância
        $moneyReserve = MoneyReserve::create($validatedData);

        // Verifica se foi criada com sucesso
        if ($moneyReserve) $sessionData['successOnCreate'] = true;

        return back()->with($sessionData);
    }

    /**
     * Display the specified resource.
     */
    public function show(MoneyReserve $moneyReserve)
    {
        $user = $moneyReserve->user; // Usuário autenticado

        $allMoneyReservesTransactions = MoneyReservesTransaction::whereHas('moneyReserve', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->orderBy('created_at', 'desc')->get();

        return view('money-reserve.show', [
            'title' => 'Reserva' . $moneyReserve->name,
            'moneyReserve' => $moneyReserve,
            'allMoneyReservesTransactions' => $allMoneyReservesTransactions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MoneyReserve $moneyReserve)
    {
        return view('money-reserve.edit', [
            'title' => 'Editar reserva de dinheiro',
            'moneyReserve' => $moneyReserve,
            'successOnCreate' => session()->get('successOnCreate')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMoneyReserveRequest $request, MoneyReserve $moneyReserve)
    {
        $validatedData = $request->validated();
        $sessionData = ['successOnUpdate' => false];
        /* rever para usar o relacionamento */
        $validatedData['user_id'] = $moneyReserve->user->id;

        try {

            if (isset($validatedData['image'])) {
                $imagePath = ImageHelper::saveImage($request->file('image'));
                $validatedData['image_path'] = $imagePath;
            }

            $sessionData['successOnCreate'] = $moneyReserve->update($validatedData);;
        } catch (\Throwable $th) {
            return back()->with($sessionData);
        }

        return back()->with($sessionData);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoneyReserve $moneyReserve)
    {
        $sessionData = ['successOnDelete' => false, 'nameOfReserveDeleted' => ''];

        try {
            $sessionData['nameOfReserveDeleted'] = $moneyReserve->name;
            if (isset($moneyReserve->image_path)) {
                ImageHelper::deleteImage('');
            }
            $sessionData['successOnDelete'] = $moneyReserve->delete();
        } catch (\Throwable $th) {
            return redirect()->route('money-reserves.index')->with($sessionData);
        }

        return redirect()->route('money-reserves.index')->with($sessionData);
    }
}
