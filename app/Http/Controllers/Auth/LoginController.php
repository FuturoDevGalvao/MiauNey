<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth/login', [
            'title' => 'Fazer Login',
            'authenticated' => session()->get('authenticated'),
            'errorOccurred' => session()->get('errorOccurred')
        ]);
    }

    public function auth(AuthLoginRequest $request)
    {
        $credentials = $request->validated();
        $sessionData = ['authenticated' => false, 'errorOccurred' => false];

        $sessionData['errorOccurred'] = !($sessionData['authenticated'] = Auth::attempt(
            credentials: $credentials,
            remember: $request->remember === "on" ? true :  false
        ));

        if ($sessionData['authenticated']) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with($sessionData);
    }

    /**
     * Log the user out of the application.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('root');
    }
}
