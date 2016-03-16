<?php

Route::get('/', 'MainController@index')->name('home');
Route::get('/setting', 'MainController@setting')->name('setting');
Route::post('/post_change_pw', 'MainController@postChangePw')->name('post_change_pw');
Route::post('/post_update_emails', 'MainController@postUpdateEmails')->name('post_update_emails');

Route::post('/post_login', 'MainController@postLogin')->name('post_login');
Route::post('/post_logout', 'MainController@postLogout')->name('post_logout');

Route::get('/import', 'MainController@import')->name('import');
Route::post('/post_import', 'MainController@postImport')->name('post_import');

Route::get('/export', 'MainController@export')->name('export');
Route::post('/post_process', 'MainController@postProcess')->name('post_process');

Route::get('/email', 'MainController@email')->name('email');
Route::post('/post_email', 'MainController@postEmail')->name('post_email');

Route::post('/post_reset', 'MainController@postReset')->name('post_reset');


