<?php

use Illuminate\Support\Facades\Route;

//Route::get('students/search', 'StudentController@search')->name('students.search');
Route::get('students/address/create/{student}', 'StudentController@addressCreate')->name('students.address.create');
Route::post('students/address/{student}', 'StudentController@addressStore')->name('students.address.store');
Route::resource('students', 'StudentController');

Route::resource('teachers', 'TeacherController');
//Route::get('/{id}', function ($id) {
//    dd($id);
//});
