<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['id', 'name_ar', 'name_en','image','logo','title_ar','title_en','description_ar',
        'description_en','price','execlusive','offer','status','menu_item_id','category_id','sub_category_id','brand_id'];


    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_item_id','id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'brand_id','id');
    }

    public function subcat()
    {
        return $this->belongsTo('App\SubCat', 'sub_category_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id','id');
    }

    public function cartProducts(){
        return $this->hasMany('App\CartProducts','product_id','id');
    }

    public function cart(){
        return $this->hasMany('App\Cart','product_id','id');
    }

    public function images()
    {
        return $this->hasMany('App\Images','product_id','id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review', 'product_id','id');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Wishlist', 'product_id','id');
    }

}
