<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Promotion extends Model
{
    use SoftDeletes;
    protected $fillable = [

        'shop_id','image', 'url'
        ];

    protected $dates = ['deleted_at'];
}
