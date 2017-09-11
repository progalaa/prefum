<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $table = 'wishlist';

    protected $fillable = ['id', 'product_id', 'user_id'];

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id','id');
    }
}
