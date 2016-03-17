<?php

// Home
Route::get('/', 'MainController@index')->name('home');

Route::group(['namespace' => 'Auth'], function () {
	Route::post('/login', 'AuthController@login')->name('login');
	Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
	Route::get('/setting', 'MainController@setting')->name('setting');
	Route::post('/post_change_pw', 'MainController@postChangePw')->name('post_change_pw');
	Route::post('/post_update_emails', 'MainController@postUpdateEmails')->name('post_update_emails');
	Route::post('/post_reset', 'MainController@postReset')->name('post_reset');


	Route::get('/import', 'MainController@import')->name('import');
	Route::post('/post_import', 'MainController@postImport')->name('post_import');

	Route::get('/applicant', 'ApplicantController@index')->name('applicant');
	Route::post('/post_process', 'ApplicantController@postProcess')->name('post_process');

	Route::get('/dept', 'DepartmentController@index')->name('dept');
	Route::get('/dept/detail/{dept}', 'DepartmentController@detail')->name('dept_detail');
	Route::post('/dept/create', 'DepartmentController@create')->name('dept_create');
	Route::post('/dept/update/{dept}', 'DepartmentController@update')->name('dept_update');
	Route::post('/dept/remove/{dept}', 'DepartmentController@remove')->name('dept_remove');

	Route::post('/dept/course/create/{dept}', 'DepartmentController@createCourse')->name('course_create');
	Route::post('/dept/course/update', 'DepartmentController@updateCourse')->name('course_update');
	Route::post('/dept/course/remove', 'DepartmentController@removeCourse')->name('course_remove');

	Route::get('/email', 'MainController@email')->name('email');
	Route::post('/post_email', 'MainController@postEmail')->name('post_email');
});


