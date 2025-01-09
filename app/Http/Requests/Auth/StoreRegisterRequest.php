<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|max:60',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|string|min:8|same:password',
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
            'name.required' => 'O campo de nome é obrigatório.',
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'name.max' => 'O nome deve ter no máximo 60 caracteres.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'email.unique' => 'Este e-mail já está em uso. Por favor, use outro.',
            'phone.required' => 'O campo de telefone é obrigatório.',
            'phone.max' => 'O número de telefone não pode ter mais de 15 caracteres.',
            'password.required' => 'O campo de senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos 8 caracteres.',
            'confirmPassword.same' => 'A confirmação da senha não corresponde à senha.'
        ];
    }
}
