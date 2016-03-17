<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\DepartmentCourse;
use App\Applicant;
use App\Import;
use Redirect;
use File;
use Excel;
use Mail;
use DB;

class Operator
{
	// Private core export function
	private function _export($applicants, $filename = null)
	{
		// Set default filename if no name given
		if (!$filename) {
			$filename = 'recruit_mate_export_'.date('d-m-Y_hia');
		}

		// Set exporting applicants exported flag to true
		foreach ($applicants as $applicant) {
			$applicant->is_exported = 1;
			$applicant->save();

			// Show courses name instead of id
			// Will be reverted back to id after exported (not saved)
			$applicant->course_of_interest_1 = $applicant->course_of_interest_1 ? $applicant->course1 : '';
			$applicant->course_of_interest_2 = $applicant->course_of_interest_2 ? $applicant->course2 : '';
			$applicant->course_of_interest_3 = $applicant->course_of_interest_3 ? $applicant->course3 : '';
		}

		// Creating csv file
		Excel::create($filename, function($excel) use ($applicants) {
			// Set tile
			$excel->setTitle('Recruit Mate Export');

			// Fill in datas from model
		    $excel->sheet('Applicants', function($sheet) use ($applicants) {
		        $sheet->fromModel($applicants);
		    });

		})->export('csv');	
	}

	// Export all applicants
	public function exportAll(Request $request)
	{	
		// Set applicants is_exported to true
		$applicants = Applicant::get();

		if ($request->has('filename')) {
			$this->_export($applicants, $request->filename);
		} else {
			$this->_export($applicants);
		}
		
	}

	// Export only checked applicants
	public function exportSelected(Request $request)
	{
		// Value and type check
		if ($request->has('selected') && is_array($request->get('selected'))) {
			$selected = $request->get('selected');

			$applicants = Applicant::whereIn('id', $selected)->get();

			// Check if applicants found
			if (!$applicants) {
				return false;
			}

			if ($request->has('filename')) {
				$this->_export($applicants, $request->filename);
			} else {
				$this->_export($applicants);
			}

			return true;
		} else {
			return false;
		}
	}

	public function sendEmails(Request $request)
	{
		if ($request->has('selected') && is_array($request->get('selected'))) {
            $selected = $request->get('selected');

            $applicants = Applicant::whereIn('id', $selected)->get();

            // Check if applicants found
            if (!$applicants) {
                return false;
            }
        }

		foreach ($applicants as $applicant) {

			Mail::send('email.notification', ['applicant' => $applicant], function ($message) {
				$message->from('DONOTREPLY@recruitmate.sg', 'Recruit Mate');
	            $message->to('park8lai@gmail.com')->subject('Recruit Mate Notification');
	        });

	        $applicant->update(['is_emailed' => true]);

		}

		return true;
	}

	public function sendEmailWithAttachment($files, $receiver)
	{	
		$temps = [];
		
		Mail::send('email.department', ['department' => $receiver], function($message) use ($files, $receiver, $temps) {
			$message->from('DONOTREPLY@recruitmate.sg', 'Recruit Mate');
	        $message->to(get_settings($receiver))->subject('Recruit Mate Export');
		    
		    foreach ($files as $file) {
				$file = $file->move(storage_path(), $file->getClientOriginalName());
				$message->attach($file);

				$temps[] = $file->getFilename();
			}	
		});

		// foreach ($temps as $temp) {
		// 	File::delete(storage_path().'/'.$temp);
		// }

		return true;
	}

	public function importFiles($files)
	{
		foreach ($files as $file) {

			// Check if this file is imported before
			$filename = $file->getClientOriginalName();
			// $import = Import::where('filename', $filename)->first();
			$import = [];

			if (!$import) {
				// Record this filename if it's a new import
				// Import::create(['filename' => $filename]);

				Excel::load($file, function($reader) {
		            $reader->each( function($sheet) {
		                $attrs = $sheet->toArray();

		                $applicant = new Applicant();
		                $applicant->fill($attrs);

		                $course_1 = null;
		                $course_2 = null;
		                $course_3 = null;

		                if ($attrs['course_of_interest_1']) {
		                	$course_1 = DepartmentCourse::where('name', $attrs['course_of_interest_1'])->first();
		            	}

		            	if ($attrs['course_of_interest_2']) {
		                	$course_2 = DepartmentCourse::where('name', $attrs['course_of_interest_2'])->first();
		            	}

		            	if ($attrs['course_of_interest_3']) {
		                	$course_3 = DepartmentCourse::where('name', $attrs['course_of_interest_3'])->first();
		            	}

		            	$applicant->course_of_interest_1 = $course_1 ? $course_1->id : null;
		            	$applicant->course_of_interest_2 = $course_2 ? $course_2->id : null;
		            	$applicant->course_of_interest_3 = $course_3 ? $course_3->id : null;

		                $applicant->save();
		            });
		        });
			}
		}

        return true;   
	}
}