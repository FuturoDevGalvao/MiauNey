<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register()
    {
        return view('auth.register', [
            'title' => 'Criar conta',
            'authenticated' => session()->get('authenticated'),
            'errorOccurred' => session()->get('errorOccurred'),
            'newUserName' => session()->get('newUserName')
        ]);
    }
    public function store(StoreRegisterRequest $request)
    {
        $sessionData = [
            'created' => false,
            'errorOccurred' => false,
            'authenticated' => false,
            'newUserName' => null
        ];

        $dataOfNewUser = $request->safe()->only(['name', 'email', 'phone', 'password']);

        try {
            // Criação do usuário
            $newUser = User::create($dataOfNewUser);

            // Autenticação do novo usuário
            Auth::login($newUser);

            $sessionData['authenticated'] = $sessionData['created'] = true;
            $sessionData['newUserName'] = $newUser->name;

            return back()->with($sessionData);
        } catch (\Throwable $th) {
            // Log do erro    
            $sessionData['errorOccurred'] = true;
            return back()->with($sessionData);
        }
    }
}
