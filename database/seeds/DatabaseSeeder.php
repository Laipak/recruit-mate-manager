<?php

use Illuminate\Database\Seeder;
use App\Department; 
use App\DepartmentCourse as Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeds for departments and courses
        Department::firstOrCreate(['id' => 1, 'name' => 'Accounting, Banking and Finance']);
        Department::firstOrCreate(['id' => 2, 'name' => 'Business and Management']);
        Department::firstOrCreate(['id' => 3, 'name' => 'Communication and Media']);
        Department::firstOrCreate(['id' => 4, 'name' => 'Hospitality and Tourism Management']);
        Department::firstOrCreate(['id' => 5, 'name' => 'Humanities and Social Sciences']);
        Department::firstOrCreate(['id' => 6, 'name' => 'Information Technology']);
        Department::firstOrCreate(['id' => 7, 'name' => 'Law']);

        // Accounting
        Course::firstOrCreate(['id' => 1, 'name' => 'Bachelor of Commerce in Accounting', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 2, 'name' => 'Bachelor of Commerce in Accounting and Banking (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 3, 'name' => 'Bachelor of Commerce in Accounting and Business Law', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 4, 'name' => 'Bachelor of Commerce in Accounting and Economics (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 5, 'name' => 'Bachelor of Commerce in Accounting and Finance (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 6, 'name' => 'Bachelor of Commerce in Accounting and Management (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 7, 'name' => 'Bachelor of Commerce in Accounting and Marketing (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 8, 'name' => 'Bachelor of Commerce in Banking', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 9, 'name' => 'Bachelor of Commerce in Banking and Business Law', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 10, 'name' => 'Bachelor of Commerce in Banking and Finance (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 11, 'name' => 'Bachelor of Commerce in Banking and Management (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 12, 'name' => 'Bachelor of Commerce in Banking and Marketing (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 13, 'name' => 'Bachelor of Commerce in Finance', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 14, 'name' => 'Bachelor of Commerce in Finance and Business Law', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 15, 'name' => 'Bachelor of Commerce in Finance and Management (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 16, 'name' => 'Bachelor of Commerce in Finance and Marketing (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 17, 'name' => 'Bachelor of Economics', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 18, 'name' => 'Bachelor of Economics and Banking (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 19, 'name' => 'Bachelor of Economics and Finance (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 20, 'name' => 'Bachelor of Economics and Management (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 21, 'name' => 'Bachelor of Economics and Marketing (Double Major)', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 22, 'name' => 'Bachelor of Economics with Business Law', 'department_id' => 1]);
        Course::firstOrCreate(['id' => 23, 'name' => 'Master of Professional Accounting', 'department_id' => 1]);

        // Business
        Course::firstOrCreate(['id' => 24, 'name' => 'Bachelor of Commerce in Human Resource Management', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 25, 'name' => 'Bachelor of Commerce in Human Resource Management and Business Law', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 26, 'name' => 'Bachelor of Commerce in Human Resource Management and Management (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 27, 'name' => 'Bachelor of Commerce in Human Resource Management and Marketing (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 28, 'name' => 'Bachelor of Commerce in International Business', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 29, 'name' => 'Bachelor of Commerce in International Business and Finance (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 30, 'name' => 'Bachelor of Commerce in International Business and Hospitality & Tourism Management (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 31, 'name' => 'Bachelor of Commerce in International Business and Management (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 32, 'name' => 'Bachelor of Commerce in International Business and Marketing (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 33, 'name' => 'Bachelor of Commerce in International Business and Web Communication (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 34, 'name' => 'Bachelor of Commerce in Management', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 35, 'name' => 'Bachelor of Commerce in Management and Business Law', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 36, 'name' => 'Bachelor of Commerce in Management and International Business (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 37, 'name' => 'Bachelor of Commerce in Management and Marketing (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 38, 'name' => 'Bachelor of Commerce in Marketing', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 39, 'name' => 'Bachelor of Commerce in Marketing and Business Law', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 40, 'name' => 'Bachelor of Commerce in Marketing and International Business (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 41, 'name' => 'Bachelor of Commerce in Marketing and Public Relations (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 42, 'name' => 'Bachelor of Commerce in Marketing and Web Communication (Double Major)', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 43, 'name' => 'Master of Business Administration', 'department_id' => 2]);
        Course::firstOrCreate(['id' => 44, 'name' => 'Master of Human Resource Management', 'department_id' => 2]);

        // Media
        Course::firstOrCreate(['id' => 45, 'name' => 'Bachelor of Communication in Communication & Media Studies', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 46, 'name' => 'Bachelor of Communication in Communication & Media Studies and Marketing (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 47, 'name' => 'Bachelor of Communication in Communication & Media Studies and Public Relations (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 48, 'name' => 'Bachelor of Communication in Communication & Media Studies and Web Communication (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 49, 'name' => 'Bachelor of Communication in Public Relations', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 50, 'name' => 'Bachelor of Communication in Public Relations and Management (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 51, 'name' => 'Bachelor of Digital Media in Web Communication', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 52, 'name' => 'Bachelor of Digital Media in Web Communication and Communication & Media Studies (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 53, 'name' => 'Bachelor of Digital Media in Web Communication and Management (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 54, 'name' => 'Bachelor of Digital Media in Web Communication and Marketing (Double Major)', 'department_id' => 3]);
        Course::firstOrCreate(['id' => 55, 'name' => 'Bachelor of Digital Media in Web Communication and Public Relations (Double Major)', 'department_id' => 3]);

        // Tourism
        Course::firstOrCreate(['id' => 56, 'name' => 'Bachelor of Arts in Tourism & Events Management', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 57, 'name' => 'Bachelor of Arts in Tourism & Events Management and Business Law', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 58, 'name' => 'Bachelor of Arts in Tourism & Events Management and Communication & Media Studies (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 59, 'name' => 'Bachelor of Arts in Tourism & Events Management and Hospitality & Tourism Management (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 60, 'name' => 'Bachelor of Arts in Tourism & Events Management and Human Resource Management (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 61, 'name' => 'Bachelor of Arts in Tourism & Events Management and Management (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 62, 'name' => 'Bachelor of Arts in Tourism & Events Management and Marketing (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 63, 'name' => 'Bachelor of Arts in Tourism & Events Management and Public Relations (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 64, 'name' => 'Bachelor of Arts in Tourism & Events Management and Web Communication (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 65, 'name' => 'Bachelor of Commerce in Hospitality & Tourism Management', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 66, 'name' => 'Bachelor of Commerce in Hospitality & Tourism Management and Business Law', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 67, 'name' => 'Bachelor of Commerce in Hospitality & Tourism Management and Human Resource Management (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 68, 'name' => 'Bachelor of Commerce in Hospitality & Tourism Management and Management (Double Major)', 'department_id' => 4]);
        Course::firstOrCreate(['id' => 69, 'name' => 'Bachelor of Commerce in Hospitality & Tourism Management and Marketing (Double Major)', 'department_id' => 4]);

        // Humanities
        Course::firstOrCreate(['id' => 70, 'name' => 'Bachelor of Arts in Psychology', 'department_id' => 5]);
        Course::firstOrCreate(['id' => 71, 'name' => 'Bachelor of Arts in Psychology and Communication & Media Studies (Double Major)', 'department_id' => 5]);
        Course::firstOrCreate(['id' => 72, 'name' => 'Bachelor of Arts in Psychology and Human Resource Management (Double Major)', 'department_id' => 5]);
        Course::firstOrCreate(['id' => 73, 'name' => 'Bachelor of Arts in Psychology and Management (Double Major)', 'department_id' => 5]);
        Course::firstOrCreate(['id' => 74, 'name' => 'Bachelor of Arts in Psychology and Marketing (Double Major)', 'department_id' => 5]);
        Course::firstOrCreate(['id' => 75, 'name' => 'Bachelor of Arts in Psychology and Web Communication (Double Major)', 'department_id' => 5]);

        // IT
        Course::firstOrCreate(['id' => 76, 'name' => 'Bachelor of Science in Business Information Systems', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 77, 'name' => 'Bachelor of Science in Business Information Systems and Computer Science (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 78, 'name' => 'Bachelor of Science in Business Information Systems and Management (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 79, 'name' => 'Bachelor of Science in Business Information Systems and Web Communication (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 80, 'name' => 'Bachelor of Science in Computer Science', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 81, 'name' => 'Bachelor of Science in Computer Science and Management (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 82, 'name' => 'Bachelor of Science in cyber forensics, Information security & Management and Business Information Systems (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 83, 'name' => 'Bachelor of Science in cyber forensics, Information security & Management and Computer Science (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 84, 'name' => 'Bachelor of Science in cyber forensics, Information security & Management and Management (Double Major)', 'department_id' => 6]);
        Course::firstOrCreate(['id' => 85, 'name' => 'Bachelor of Science in cyber forensics, Information security and Management', 'department_id' => 6]);

        // Law
        Course::firstOrCreate(['id' => 86, 'name' => 'Bachelor of Commerce in Business Law', 'department_id' => 7]);

        // Applicant seeder
        DB::table('applicants')->truncate();
        factory(App\Applicant::class, 10)->create();

        $this->call(UserSeeder::class);
    }
}
