<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = ['id', 'city_ar', 'city_en','country_ar','country_en','street_ar','street_en','lat','lng'];
}
