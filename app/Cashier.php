<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    protected $fillable = [

        'username','name', 'phone', 'email', 'password','shop_id','branch_id'
 
        ];
}
