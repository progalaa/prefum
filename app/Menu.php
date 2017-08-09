<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menu_item';

    protected $fillable = ['id', 'name_ar', 'name_en'];

    public function categories()
    {
        return $this->hasMany('App\Category', 'menu_item_id','id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'menu_item_id','id');
    }
}
