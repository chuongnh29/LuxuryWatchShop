<?php

namespace App\Rules;

use App\Products;
use Illuminate\Contracts\Validation\Rule;

class CheckTenSP implements Rule
{
    protected $name;
    protected $id;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->id = $id;
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
        $isPass = true;
        if($this->id == null){
            $product = Products::where('name',$this->name)->first();
            if($product){
                $isPass = false;
            }
        }else{
            $product = Products::where('id', (int) $this->id)->first();
            $nameProduct = $product->name;

            if($this->name == $nameProduct){
                $isPass = true;
            }else{
                $product = Products::where('name',$this->name)->first();
                if($product){
                    $isPass = false;
                }
            }
        }

        return $isPass;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tên sản phẩm đã tồn tại';
    }
}
