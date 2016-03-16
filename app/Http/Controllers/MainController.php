<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Import;
use App\Services\Operator;
use Illuminate\Http\Request;
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

    public function setting()
    {
        $settings = get_settings();

        return view('setting', compact('settings'));
    }

    public function postChangePw(Request $request)
    {
        $settings = get_settings();

        if (!$request->has('new_pw') || !$request->has('new_pw_confirmation') || !$request->has('current_pw')) {
            Session::flash('error', 'Please make sure all the fields are filled');
            return back();
        }

        if ($request->get('current_pw') != $settings['admin_pw']) {
            Session::flash('error', 'Wrong password');
            return back();
        }

        if ($request->get('new_pw') != $request->get('new_pw_confirmation')) {
            Session::flash('error', 'Unmatch new password');
            return back();
        }

        set_setting('admin_pw', $request->get('new_pw'));

        Session::flash('success', 'Password updated !');
        return back();
    }

    public function postUpdateEmails(Request $request)
    {
        set_setting('accounting, banking and finance', $request->get('accounting'));
        set_setting('business and management', $request->get('business'));
        set_setting('communication and media', $request->get('communication'));
        set_setting('hospitality and tourism management', $request->get('hospitality'));
        set_setting('humanities and social sciences', $request->get('humanities'));
        set_setting('information technology', $request->get('it'));
        set_setting('law', $request->get('law'));

        Session::flash('success', 'Department emails updated !');
        return back();
    }

    public function postLogin(Request $request)
    {
        if (!$request->has('username') || !$request->has('password')) {
            Session::flash('error', 'Please insert username and password');
            return back();
        }

        $info = get_settings();

        if ($request->get('username') != $info['admin_id'] || $request->get('password') != $info['admin_pw']) {
            Session::flash('error', 'Username or password wrong');
            return back();
        }

        Session::flash('success', 'Succesfully login !');
        return Redirect::route('export');
    }

    public function postLogout()
    {
        Session::flash('success', 'Succesfully logout !');
        return Redirect::route('home');
    }

    public function email()
    {
        $emails = [
            'accounting, banking and finance',
            'business and management',
            'communication and media',
            'hospitality and tourism management',
            'humanities and social sciences',
            'information technology',
            'law',
        ];
    	
        return view('email', compact('emails'));
    }

    public function postEmail(Request $request)
    {
        if ($request->hasFile('files') && $request->has('receiver')) {

            $files = $request->file('files');
            
            foreach ($files as $file) {
                if (!$file->isValid() || pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION) != 'csv') {
                    Session::flash('error', 'Invalid file extension');
                    return back();
                }
            }

            if ($this->operator->sendEmailWithAttachment($files, $request->receiver)) {
                Session::flash('success', 'Succesfully emailed to the receiver !');
            } else {
                Session::flash('error', 'File format unmatch');
            }
            
        } else {
            Session::flash('error', 'Invalid input');
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
        
        return Redirect::route('export');
    }

    public function export(Request $request)
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
        return view('export', compact('applicants'));
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

    public function manage()
    {
        return view('manage');
    }

    public function postReset(Request $request)
    {
        Applicant::query()->delete();

        if ($request->all_reset) {
            Import::query()->delete();
        }

        Session::flash('success', 'All records has been removed from the database');
        return back();
    }
}
