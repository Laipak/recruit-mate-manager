<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments'; 

    protected $fillable = [
    	'name',
        'email',
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function courses()
    {
        return $this->hasMany(DepartmentCourse::class);
    }

    public function scopeWithEmail($query)
    {
        return $query->whereNotNull('email'); 
    }
}
