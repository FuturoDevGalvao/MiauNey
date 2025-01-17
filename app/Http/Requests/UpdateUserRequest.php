<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:60',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'profileImage' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
            'bannerImage' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'Seu novo nome de usuário precisa ter, pelo menos, 3 caracteres.',
            'name.max' => 'Seu novo nome de usuário pode ter, no máximo, 60 caracteres.',
            'email.required' => 'O campo de e-mail é obrigatório.',
            'email.email' => 'Por favor, insira um e-mail válido.',
            'phone.required' => 'O campo de telefone é obrigatório.',
            'phone.max' => 'O número de telefone não pode ter mais de 15 caracteres.',
            'profileImage.image' => 'Os arquivos selecionados devem ser uma imagem.',
            'profileImage.mimes' => 'As imagens que você selecionar devem ser do tipo: jpg, png, jpeg ou gif.',
            'profileImage.max' => 'As imagens que você selecionar não devem ter mais de 2048 kilobytes.',
            'bannerImage.image' => 'Os arquivos selecionados devem ser uma imagem.',
            'bannerImage.mimes' => 'As imagens que você selecionar devem ser do tipo: jpg, png, jpeg ou gif.',
            'bannerImage.max' => 'As imagens que você selecionar não devem ter mais de 2048 kilobytes.',
        ];
    }
}
