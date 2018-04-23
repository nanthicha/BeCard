<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [

        'username','name', 'phone', 'latlng', 'shop_id'
 
        ];
}
