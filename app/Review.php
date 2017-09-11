<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';

    protected $fillable = ['id', 'value', 'comment','user_email','product_id'];

    public function products()
    {
        return $this->belongsTo('App\Product', 'product_id','id');
    }
}
