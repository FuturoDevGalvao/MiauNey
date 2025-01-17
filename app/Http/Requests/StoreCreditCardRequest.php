<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCreditCardRequest extends FormRequest
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
            'institution' => 'required|string|min:3|max:60',
            'limit' => 'required',
            'validity' => 'required|string|min:5|max:5',
            'due_date' => 'required|string|min:5|max:5',
            'color' => 'required|string'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O campo de nome é obrigatório.',
            'name.min' => 'O nome do seu novo cartão deve ter, pelo menos, 3 caracteres.',
            'name.max' => 'O nome do seu novo cartão deve ter, no máximo, 60 caracteres.',

            'institution.required' => 'A instituição do seu novo cartão é obrigatória.',
            'institution.min' => 'O nome da instituição do seu novo cartão deve ter, no mínimo, 3 caracteres.',
            'institution.max' => 'O nome da instituição do seu novo cartão deve ter, no máximo, 60 caracteres.',

            'limit.required' => 'O limite do seu novo cartão é obrigatório.',

            'validity.required' => 'A validade do seu novo cartão é obrigatória.',
            'validity.min' => 'A validade deve ter exatamente 5 caracteres no formato MM/AA.',
            'validity.max' => 'A validade deve ter exatamente 5 caracteres no formato MM/AA.',

            'due_date.required' => 'A data de vencimento do seu novo cartão é obrigatória.',
            'due_date.min' => 'A data de vencimento deve ter exatamente 5 caracteres no formato DD/MM.',
            'due_date.max' => 'A data de vencimento deve ter exatamente 5 caracteres no formato DD/MM.',

            'color.required' => 'A cor do cartão é obrigatória.'
        ];
    }
}
