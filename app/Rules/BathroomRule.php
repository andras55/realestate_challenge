<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class BathroomRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($real_estate_type)
    {
        $this->ret = $real_estate_type;
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
        
        $ret = $this->ret;
        if (($ret != 'land' || $ret != 'commercial_ground') && (int) $value == 0) {
            return false;
        }
        else{
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The number of bathrooms only can be zero when the real estate type is land or commercial ground';
    }
}
