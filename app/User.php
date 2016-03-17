<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser as SentinelModel;

class User extends SentinelModel
{
    protected $loginNames = ['email', 'username'];
    protected $hidden = ['password', 'remember_token'];

    protected $fillable = [
        'first_name',
        'last_name',
        'username', 
        'email', 
        'password',
    ];


    public function __tostring()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
