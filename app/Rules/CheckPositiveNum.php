<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckPositiveNum implements Rule
{
    protected $name;
    protected $num;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($num, $name)
    {
        $this->num = $num;
        $this->name = $name;
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
        return (int) $this->num > 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->name.' phải lớn hơn không';
    }
}
