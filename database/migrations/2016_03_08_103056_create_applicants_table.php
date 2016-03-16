<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function ($table) {
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('nationality');
            $table->string('nric')->nullable();
            $table->string('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email');
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->integer('postal')->nullable();
            $table->string('address_country')->nullable();

            $table->string('english_proficiency');
            $table->float('gpa')->nullable();
            $table->string('course_type')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->string('course_of_interest_1');
            $table->string('course_of_interest_2')->nullable();
            $table->string('course_of_interest_3')->nullable();
            $table->string('device_name')->nullable();
            $table->string('enquiry')->nullable();
            $table->boolean('is_emailed')->default(0);
            $table->boolean('is_exported')->default(0);
            $table->date('registered_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('applicants');
    }
}
