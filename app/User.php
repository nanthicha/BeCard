<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Gbrock\Table\Traits\Sortable;

class User extends Authenticatable
{
    use Notifiable,Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'username','name', 'email', 'password','private_key','phone','role'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $sortable = ['username', 'name','email','role','bePoint','created_at'];

}
