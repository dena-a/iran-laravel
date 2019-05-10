<?php

namespace Dena\IranLaravel\Rules;

use Illuminate\Contracts\Validation\Rule;

use Dena\IranLaravel\Helpers\NationalIdentityCode;

class IranNationalIdentityCode implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (NationalIdentityCode::IranNationalIdentityCodeValidation($value)) ? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('iran_laravel::iran_laravel.iran_national_identity_code');
    }
}