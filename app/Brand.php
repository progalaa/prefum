<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    protected $fillable = ['id', 'name_ar', 'name_en'];

    public function products()
    {
        return $this->hasMany('App\Product', 'brand_id','id');
    }
}
