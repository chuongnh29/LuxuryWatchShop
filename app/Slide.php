<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = "slide";

    public function product_type()
    {
        return $this->belongsTo('App\ProductType', 'name_id', 'name_id');
    }
}
