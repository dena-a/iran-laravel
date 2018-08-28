<?php

namespace Dena\IranLaravel\Rules;

use Illuminate\Contracts\Validation\Rule;

use Dena\IranLaravel\Helpers\Birthday;

class JalaliBirthday implements Rule
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
        return (Birthday::JalaliBirthdayValidation($value)) ? true : false ;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('iran_laravel.jalali_birthday');
    }
}