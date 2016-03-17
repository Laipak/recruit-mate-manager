<?php

namespace App\Http\Controllers;

use App\DepartmentCourse as Course;
use Illuminate\Http\Request;
use App\Department;
use App\Applicant;
use App\Import;
use Sentinel;
use Redirect;
use Session;
use File;
use DB;

class SettingController extends Controller
{
    public function index()
    {
    	$departments = Department::get();

        return view('setting', compact('departments'));
    }

    // POST
    public function updatePw(Request $request)
    {
        $this->validate($request, [
            'current_pw' => 'required',
            'new_pw' => 'required|confirmed'
        ]);

        $user = Sentinel::getUser();
        $hasher = Sentinel::getHasher();

        if (!$hasher->check($request->current_pw, $user->password)) {
            Session::flash('error', 'Incorrect password !');
            return back();
        }

        Sentinel::update($user, ['password' => $request->new_pw]);

        Session::flash('success', 'Password updated !');
        return back();
    }

    // POST
    public function updateEmail(Request $request)
    {
        $user = Sentinel::getUser();
        
        $user->email = $request->get('email', NULL);
        $user->save();

        Session::flash('success', 'Email updated !');
        return back();
    }

    // POST
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users,username',
            'email' => 'email',
            'password' => 'required|confirmed',
        ]);
        
        $credentials = [
            'username'    => $request->username,
            'password' => $request->password,
        ];

        $user = Sentinel::registerAndActivate($credentials);
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);

        if ($request->has('is_admin')) {
            $role = Sentinel::findRoleByName('Admin');
            $role->users()->attach($user);
        }
        
        Session::flash('success', 'New user - ' . $user . ' created !');
        return back();
    }

    // POST
    public function reset(Request $request)
    {
        Applicant::query()->delete();

        if ($request->reset_import) {
            Import::query()->delete();
        }

        if ($request->reset_dept) {
            Department::query()->delete();
            Course::query()->delete();
        }

        Session::flash('success', 'All records has been removed from the database');
        return back();
    }
}
