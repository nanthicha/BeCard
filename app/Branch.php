<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Branch extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'username','name', 'phone', 'latlng', 'shop_id'
 
        ];
    protected $dates = ['deleted_at'];
        
}
