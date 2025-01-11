<?php

namespace App\Http\Controllers;

use App\Helpers\ImageHelper;
use App\Http\Requests\StoreMoneyReserveRequest;
use App\Http\Requests\UpdateMoneyReserveRequest;
use App\Models\MoneyReserve;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MoneyReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('money-reserve.index', ['title' => 'Minhas reservas de dinheiro', 'allMoneyReserves' => MoneyReserve::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('money-reserve.create', [
            'title' => 'Nova reserva de dinheiro',
            'successOnCreate' => session()->get('successOnCreate')
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
            $imagePath = ImageHelper::saveImage($request->file('image'));
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
        return view('money-reserve.show', ['title' => 'Minhas reservas', 'moneyReserve' => $moneyReserve]);
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
    public function update($request, $id)
    {
        // Valida os dados recebidos
        $validatedData = $request->validated();

        // Recupera o usuário pelo ID
        $user = User::findOrFail($id);
        $user->update($validatedData);

        /* Lógica de armazenamento de fotos de usuário */
        if (isset($validatedData['profileImage'])) {
            $pathNewImage = ImageHelper::saveImage($validatedData['profileImage']);

            try {
                if ($user->profileImage) {
                    ImageHelper::deleteImage($user->profileImage->path);
                    $user->profileImage->path = $pathNewImage;
                    $user->profileImage->save();
                } else {
                }
            } catch (\Throwable $th) {
                return redirect()->back()->with([
                    'errorOnUpdate' => true
                ]);
            }
        }

        // Redireciona ou retorna uma resposta de sucesso
        return redirect()->back()->with([
            'successOnUpdate' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MoneyReserve $moneyReserve)
    {
        //
    }
}
