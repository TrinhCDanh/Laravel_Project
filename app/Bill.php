<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['id', 'date_order', 'total', 'note', 'check_order', 'customer_id'];

    public function bill() {
    	return $this->hasMany('App\BillDetail');
    }

    public function customer() {
    	return $this->belongTo('App\Customer');
    }
}
