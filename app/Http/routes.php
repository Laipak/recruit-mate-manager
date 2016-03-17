<?php

// Home
Route::get('/', 'MainController@index')->name('home');

Route::group(['namespace' => 'Auth'], function () {
	Route::post('/login', 'AuthController@login')->name('login');
	Route::get('/logout', 'AuthController@logout')->name('logout');
});

Route::group(['middleware' => 'auth'], function() {
	
	Route::get('/setting', 'SettingController@index')->name('setting');
	Route::post('/setting/update_pw', 'SettingController@updatePw')->name('setting_update_pw');
	Route::post('/setting/update_email', 'SettingController@updateEmail')->name('setting_update_email');
	Route::post('/setting/create_user', 'SettingController@createUser')->name('setting_create_user');
	Route::post('/setting/reset', 'SettingController@reset')->name('setting_reset');

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


