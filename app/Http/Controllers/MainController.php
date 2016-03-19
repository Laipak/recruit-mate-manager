<?php

namespace App\Http\Controllers;

use App\DepartmentCourse as Course;
use Illuminate\Http\Request;
use App\Services\Operator;
use App\Department;
use App\Applicant;
use App\Import;
use Sentinel;
use Redirect;
use Session;
use File;
use DB;

class MainController extends Controller
{
    public function __construct(Operator $operator)
    {
        $this->operator = $operator;
    }

    public function index()
    {
    	return view('home');
    }

    public function email()
    {
        $depts = Department::withEmail()->get();
    	
        return view('email', compact('depts'));
    }

    public function postEmail(Request $request)
    {
        if ($request->hasFile('files') && $request->has('receiver')) {

            $files = $request->file('files');
            
            foreach ($files as $file) {
                if (!$file->isValid() || pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION) != 'csv') {
                    Session::flash('error', 'Invalid file extension !');
                    return back();
                }
            }

            $dept = Department::find($request->receiver);

            if (!$dept) {
                Session::flash('error', 'Receiver not found !');
                return back();
            }

            if ($this->operator->sendEmailWithAttachment($files, $dept)) {
                Session::flash('success', 'Succesfully emailed to the receiver !');
            } else {
                Session::flash('error', 'File format unmatch');
            }
            
        } else {
            Session::flash('error', 'Invalid input !');
        }

        return back();
    }

    public function import()
    {
    	return view('import');
    }

    public function postImport(Request $request)
    {
        if ($request->hasFile('imports')) {

            $files = $request->file('imports');
            
            foreach ($files as $file) {
                if (!$file->isValid() || pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION) != 'csv') {
                    Session::flash('error', 'Invalid file extension');
                    return back();
                }
            }

            if ($this->operator->importFiles($files)) {
                Session::flash('success', 'File succesfully imported !');
            } else {
                Session::flash('error', 'File format unmatch');
            }
            
        }
        
        return Redirect::route('applicant');
    }
}
