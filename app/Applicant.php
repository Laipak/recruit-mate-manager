<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $table = 'applicants'; 

    protected $fillable = [
    	'name',
        'gender',
        'nationality',
        'nric',
        'dob',
        'mobile',
        'email',
        'address_line_1',
        'address_line_2',
        'postal',
        'address_country',
        'english_proficiency',
        'gpa',
        'course_type',
        'expected_start_date',
        'course_of_interest_1',
        'course_of_interest_2',
        'course_of_interest_3',
        'device_name',
        'is_emailed',
        'is_exported',
        'registered_at',
    ];
}
