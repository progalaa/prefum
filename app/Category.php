<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $fillable = ['id', 'name_ar', 'name_en','menu_item_id'];

    public function subcats()
    {
        return $this->hasMany('App\SubCat', 'category_id','id');
    }

    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_item_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id','id');
    }
}
