<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DepartmentCourse extends Model
{
    protected $table = 'department_courses'; 

    protected $fillable = [
    	'name',
    ];

    public function __toString()
    {
        return $this->name;
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
