<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class LinkedinUrl implements Rule
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
        $url = explode("/", $value);
        if ($url[0] == 'https:' && $url[2] == 'www.linkedin.com') {
            return true;
        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation linkedin url is false.';
    }
}
