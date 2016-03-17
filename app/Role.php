<?php

namespace App;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
    protected $fillable = [
        'name',
        'slug',
        'permissions',
    ];
}
