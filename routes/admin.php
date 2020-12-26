<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'locale'
], function () {
    Route::get('students/address/create/{student}', 'StudentController@addressCreate')->name('students.address.create');
    Route::post('students/address/{student}', 'StudentController@addressStore')->name('students.address.store');
    Route::resource('students', 'StudentController');

    Route::resource('teachers', 'TeacherController');
    Route::resource('courses', 'CourseController');
    Route::resource('categories', 'CategoryController');
});
