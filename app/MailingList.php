<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailingList extends Model
{
    protected $table = 'mailing_lists';

    protected $fillable = ['id', 'name','email', 'phone','message'];
}
