<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['id','image', 'product_id'];
    

    public function product()
    {
        return $this->belongsTo('App\Product','product_id','id');
    }
}
