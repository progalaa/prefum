<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{
    protected $table = 'site_user';

    protected $fillable = ['id', 'prefix_ar', 'first_name', 'last_name', 'email', 'password', 'offers',
            'telephone', 'street_adress', 'street_adress_2', 'city', 'country'];


    public function cart(){
        return $this->hasOne('App\Cart','user_id','id');
    }
    
}
