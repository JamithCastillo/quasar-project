<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePerroRequest extends FormRequest
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
            'tamano' => ['nullable', 'integer', 'gt:0', 'lt:10000'],
            'fechafactura' => ['nullable', 'string', 'max:255'],
            'importotal' => ['nullable', 'string', 'max:255'],
            'imp0' => ['nullable', 'integer', 'gt:0', 'lt:10000'],
            'bonificacion' => ['nullable', 'integer', 'gt:0', 'lt:10000'],
            'color' => ['nullable', 'string', 'max:255'],
            'dueno' => ['nullable', 'integer', 'gt:0', 'lt:10000'],
            'proveedor' => ['nullable', 'integer', 'gt:0', 'lt:10000'],
            'raza' => ['nullable', 'integer', 'gt:0', 'lt:10000']
        ];
    }
}
