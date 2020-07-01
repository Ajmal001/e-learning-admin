<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::group(['prefix' => 'users', 'middleware' => ['auth', 'authAdmin']], function(){
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('/create', 'UserController@create')->name('users.create');
    Route::post('/create', 'UserController@store')->name('users.store');
    Route::get('file-upload', 'UserController@fileUploadPage');
});

route::group(['prefix' => 'students', 'middleware' => ['auth', 'authAdmin']], function(){
    Route::get('/', 'AdminController@all_students')->name('students.index');
    Route::get('/{user}/register-subjects/', 'AdminController@student_subjects_form')->name('student.subjects.register-form');
    Route::post('/{user}/register-subjects/', 'AdminController@student_subjects_register')->name('student.subjects.register');
    Route::get('/{user}/register-grade/', 'AdminController@student_grade_form')->name('student.grade.register-form');
    Route::post('/{user}/register-grade/', 'AdminController@student_grade_register')->name('student.grade.register');
});

route::group(['prefix' => 'teachers', 'middleware' => ['auth', 'authAdmin']], function(){
    Route::get('/', 'AdminController@all_teachers')->name('teachers.index');
    Route::get('/{user}/register-subject/', 'AdminController@teacher_subject_form')->name('teacher.subject.register-form');
    Route::post('/{user}/register-subject/', 'AdminController@teacher_subject_register')->name('teacher.subject.register');
    Route::get('/{user}/register-grades/', 'AdminController@teacher_grades_form')->name('teacher.grades.register-form');
    Route::post('/{user}/register-grades/', 'AdminController@teacher_grades_register')->name('teacher.grades.register');
    Route::post('/firebase-upload', 'AdminController@firebase_upload')->name('teacher.firebase-upload');
});

