<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;


class Shop extends Model
{
	use Sortable;

   	protected $fillable = [

       'username','name', 'description', 'logo', 'imgCover', 'time', 'type', 'latlng', 'package'

   	];

    protected $sortable = ['name','type','package','created_at','status'];


}
