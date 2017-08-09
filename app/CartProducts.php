<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProducts extends Model
{
    protected $table = 'cart_products';
    protected $fillable = ['id', 'cart_id', 'product_id','price','qty'];

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    
    public function cart(){
        return $this->belongsTo('App\Cart','user_id','id');
    }
}
