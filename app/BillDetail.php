<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_detail";

    public function product()
    {
        return $this->belongsTo('App\Products', 'product_id', 'id');
    }

    public function bill()
    {
        return $this->belongsTo('App\Products', 'bill_id', 'id');
    }
}
