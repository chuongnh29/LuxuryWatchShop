<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CheckGiaGocGiaSale implements Rule
{
    protected $giaGoc;
    protected $giaSale;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($giaGoc, $giaSale)
    {
        $this->giaGoc = $giaGoc;
        $this->giaSale = $giaSale;
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
        return ((int) $this->giaGoc) >= ((int) $this->giaSale);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Giá gốc phải lớn hơn hoặc bằng giá sale';
    }
}
