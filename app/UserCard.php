<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Gbrock\Table\Traits\Sortable;


class UserCard extends Model
{
	use Sortable;

   	protected $fillable = [

       'username'

   	];

    protected $sortable = ['username','card_id','point','created_at'];


}
