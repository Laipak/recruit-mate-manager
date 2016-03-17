<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\DepartmentCourse as Course;
use App\Applicant;
use App\Services\Operator;
use Session;

class DepartmentController extends Controller
{
    public function index()
    {
        $depts = Department::with('courses')->get();

        return view('dept', compact('depts'));
    }

    public function detail(Department $dept)
    {   
        return view('dept_detail', compact('dept'));
    }

    // POST
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:departments,name',
            'email' => 'email'
        ]);

        $dept = Department::create([
            'name' => $request->name,
        ]);

        if ($request->has('email')) {
            $dept->email = $request->email;
            $dept->save();
        }

        Session::flash('success', 'New department - ' . $dept . ' has been succesfully created !');
        return back();
    }

    // POST
    public function update(Request $request, Department $dept)
    {
        if ($request->has('email')) {

            $dept->update(['email' => $request->email]);
            Session::flash('success', 'Department email updated !');
        }

        return back();
    }

    // POST
    public function remove(Department $dept)
    {
        $name = $dept->name;
        
        $dept->courses()->delete();
        $dept->delete();

        Session::flash('success', 'Department of ' . $name . ' and corresponding courses has been succesfully removed !');
        return redirect()->route('dept');
    }


    // POST
    public function createCourse(Request $request, Department $dept)
    {
        $this->validate($request, [
            'name' => 'required|unique:department_courses,name'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'email' => $request->get('email', null)
        ]);

        $dept->courses()->save($course);

        Session::flash('success', 'New course - ' . $course . ' has been succesfully created under the department - ' . $dept . ' !');
        return back();
    }

    // POST
    public function updateCourse(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:department_courses,name'
        ]);

        if ($request->has('id')) {
            $course = Course::find($request->id);
            
            $oldName = $course->name;

            $course->name = $request->name;
            $course->save();

            $newName = $course->name;
            
            Session::flash('success', 'Course ' . $oldName . ' has been succesfully renamed to ' . $newName . ' !');
        } else {
            Session::flash('error', 'Something gone wrong, please try again later.');
        }

        return back();
    }

    // POST
    public function removeCourse(Request $request)
    {
        if ($request->has('id')) {
            $course = Course::find($request->id);
            $name = $course->name;
            $course->delete();
            
            Session::flash('success', 'Course - ' . $name . ' has been succesfully removed !');
        } else {
            Session::flash('error', 'Something gone wrong, please try again later.');
        }

        return back();
    }
}
