<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use League\ISO3166\ISO3166;
use League\ISO3166\Exception\OutOfBoundsException;

class CountryRule implements Rule
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
        try {
            $var = (new ISO3166)->alpha2($value);
            return true;                        
        } catch (OutOfBoundsException $e) {
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The country must be a code under ISO 3166-Alpha2';
    }
}
