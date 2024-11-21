<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuelRequest extends FormRequest
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
            'name' => 'required|string|max:255|min:2',
        ];
    }

    /**
     * Get custom attribute names for validator errors in Hungarian.
     *
     * @return array
     */
    // public function attributes()
    // {
    //     return [
    //         'name' => 'Játék neve',
    //         'type' => 'Típus',
    //         'levelCount' => 'Szintek száma',
    //         'description' => 'Leírás',
    //     ];
    // }


    public function messages(): array
    {
        return [
            'name.required' => 'Az üzemanyag megadása kötelező.',
            'name.min' => 'Az üzemanyag túl rövid, legalább 2 karakter szükséges.',
            'name.max' => 'Az üzemanyagtúl hosszú, maximum 255 karakter.',
        ];
    }

}

