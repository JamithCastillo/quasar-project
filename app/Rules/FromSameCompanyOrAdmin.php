<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class FromSameCompanyOrAdmin implements Rule
{
    /**
     * Determine if the validation rule passes.
     * Rule used when user wants to update user. We must check that user is not changing company id of user. If is admin, can do it, otherwise, not.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // company id of user can only be modified by admin user
        if (Auth::user()->hasRole('admin')) {
            return true;
        }

        // or can pass if the company id is the same of the company_admin company id
        return $value === Auth::user()->company_id;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Su usuario no está autorizado a realizar esta acción';
    }
}
