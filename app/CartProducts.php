<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    protected $table = 'cart_products';
    protected $fillable = ['id', 'user_id', 'product_id','price','qty'];

    public function products(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    

}
