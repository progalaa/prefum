<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = ['id', 'user_id', 'total_price','state','order_date'];


    public function user(){
        return $this->belongsTo('App\SiteUser','user_id','id');
    }

    public function cartProducts(){
        return $this->hasMany('App\CartProducts','cart_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Product','product_id','id');
    }
    
}
