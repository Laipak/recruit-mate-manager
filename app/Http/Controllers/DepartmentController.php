<?php

namespace App\Http\Controllers;

use App\Department;
use App\Applicant;
use App\Services\Operator;
use Illuminate\Http\Request;
use Session;

class DepartmentController extends Controller
{
    public function index()
    {
        $depts = Department::with('courses')->get();
        
        return view('dept', compact('depts'));
    }

    // POST
    public function create()
    {

    }

    // POST
    public function update()
    {

    }

    // POST
    public function remove()
    {

    }
}
