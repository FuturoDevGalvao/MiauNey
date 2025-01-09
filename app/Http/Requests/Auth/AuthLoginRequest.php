<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;  // Se você não tem uma lógica de autorização, pode retornar true.
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the custom messages for the validator.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha que você definiu tem pelo menos 8 caracteres.',
        ];
    }
}
