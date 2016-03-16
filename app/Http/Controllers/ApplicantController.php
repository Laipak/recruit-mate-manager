<?php

namespace App\Http\Controllers;

use App\Department;
use App\Applicant;
use App\Services\Operator;
use Illuminate\Http\Request;
use Session;

class ApplicantController extends Controller
{
    public function __construct(Operator $operator)
    {
        $this->operator = $operator;
    }

    public function index(Request $request)
    {
        // Setup model query builder
        $query = Applicant::query();

        // Query for exported applicant
        if ($request->has('is_exported') && is_numeric($request->get('is_exported'))) {
            $query->where('is_exported', $request->get('is_exported'));
        }

        // Query for emailed applicant
        if ($request->has('is_emailed') && is_numeric($request->get('is_emailed'))) {
            $query->where('is_emailed', $request->get('is_emailed'));
        }

        // Query for specific department if exist
        if ($request->has('department')) {
            $depts = \Config::get('hook.courses.'.$request->department);
            
            $query->where(function ($q) use ($depts) {
                $q->whereIn('course_of_interest_1', $depts)
                    ->orWhereIn('course_of_interest_2', $depts)
                    ->orWhereIn('course_of_interest_3', $depts);
            });
        }

        // Query for specific course if exist
        if ($request->has('course')) {

            $query->where(function ($q) use ($request) {
                $q->where('course_of_interest_1', $request->course)
                    ->orWhere('course_of_interest_2', $request->course)
                    ->orWhere('course_of_interest_3', $request->course);
            });
        }

        $applicants = $query->get();
        return view('applicant', compact('applicants'));
    }

    public function postProcess(Request $request)
    {
        switch ($request->action) {
            case 'EXPORTALL':
                if (Applicant::count() < 1) {
                    Session::flash('error', 'Export failed, there are no data in the database');
                } else {
                    $this->operator->exportAll($request);
                }
                break;
            
            case 'EXPORTSELECTED':
                if (!$this->operator->exportSelected($request)) {
                    Session::flash('error', 'Export failed, something has gone wrong, please try again');
                }
                break;

            case 'SENDEMAIL':
                if ($this->operator->sendEmails($request)) {
                    Session::flash('success', 'Emails succesfully sent');
                } else {
                    Session::flash('error', 'Emails not sent, please try again');
                }
                break;
            
            default:
                # code...
                break;
        }

        return back();
    }
}
