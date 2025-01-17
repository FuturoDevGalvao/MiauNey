<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMoneyReserveRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:30',
            'description' => 'required|string|min:10',
            'goal' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.min' => 'O nome da nova reserva precisa ter, pelo menos, 3 caracteres.',
            'name.max' => 'O nome da nova reserva pode ter, no máximo, 60 caracteres.',
            'description.required' => 'A descrição para a nova reserva é obrigatória.',
            'description.min' => 'A descrição para a nova reserva deve ter, no mínimo, 10 caracteres.',
            'goal.required' => 'A meta é obrigatória é obrigatório.',
            'image.image' => 'O arquivo deve ser uma imagem.',
            'image.mimes' => 'A imagem deve ser do tipo: jpg, png, jpeg ou gif.',
            'image.max' => 'A imagem não deve ter mais de 2048 kilobytes.',
        ];
    }
}
