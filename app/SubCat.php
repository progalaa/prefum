<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCat extends Model
{
    protected $table = 'sub_category';

    protected $fillable = ['id', 'name_ar', 'name_en','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'sub_category_id','id');
    }
}
