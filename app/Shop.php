<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
   protected $fillable = [

       'username','name', 'description', 'logo', 'imgCover', 'time', 'type', 'latlng', 'package'

   ];

}
