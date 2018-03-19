<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = 'bill_details';
    protected $fillable = ['id', 'product_id', 'bill_id', 'quantity', 'unit_price'];

    public function product() {
    	return $this->belongTo('App\Product');
    }

    public function bill() {
    	return $this->belongTo('App\Bill');
    }
}
