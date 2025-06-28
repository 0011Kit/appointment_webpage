<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    protected $fillable =
    [
        'record_status', 
        'name', 
        'email', 
        'phone', 
        'desc', 
        'app_date',
        'app_timefrom',
        'app_timeTo',
        'title',
        'topic'
    ];
    //$fillable  -- to tell system that these fields are filled by us, not auto created. 
}
