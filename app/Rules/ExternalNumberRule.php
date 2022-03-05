<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExternalNumberRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/^([a-zA-Z0-9]+-)*[a-zA-Z0-9]+$/', $value)) {
            return true;
        }
        else{
            false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'External Number only accepts alphanumeric characters and dash.';
    }
}
