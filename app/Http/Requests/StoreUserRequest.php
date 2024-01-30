<?php

namespace App\Http\Requests;

use App\Rules\OnlyAdminUser;
use App\Rules\OnlyAdminOrComercial;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'movil' => ['nullable', 'string', 'max:255'],
            'telefono' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Password::defaults()],
            // 'user.email' => ['required', 'email', 'unique:users,email'],
            // 'user.password' => ['required', 'confirmed', Password::defaults()],
            // 'user.is_enabled' => ['nullable', 'boolean'],
            // 'user.roles' => ['nullable', 'array', new OnlyAdminUser()],
        ];
    }

    
}
