<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumber implements Rule
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
        return preg_match('/^((086|096|097|098|039|038|037|036|035|034|033|032|091|094|088|083|084|085|081|082|070|079|077|076|078|089|090|093|092|052|056|058|099|059|087)\d{7})$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Số điện thoại không hợp lệ.';
    }
}
