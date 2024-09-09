<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticable
{
    use Notifiable;

    protected $fillable=[
        'name','email','password'
    ];

    protected $hidden=[
        'password','remeber_token'
    ];
}
