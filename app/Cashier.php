<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Cashier extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'username','name', 'phone', 'email', 'password','shop_id','branch_id'
 
        ];
    protected $dates = ['deleted_at'];
}
