<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePerroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'numero' => ['required', 'string', 'max:255'],
            'tamano' => ['required', 'integer', 'gt:0', 'lt:10000'],
            'fechafactura' => ['required', 'string', 'max:255'],
            'importotal' => ['required', 'string', 'max:255'],
            'imp0' => ['nullable', 'string', 'max:255'],
            'bonificacion' => ['nullable', 'string', 'max:255'],
            'color' => ['nullable', 'string', 'max:255'],
            'dueno' => ['nullable', 'nullable', 'max:255'],
            'raza' => ['nullable', 'string', 'max:255'],
        ];
    }
}
