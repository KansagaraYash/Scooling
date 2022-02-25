<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;


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

Route::get('/index', [AdminController::class,'index']);

// use belongsTo, hasOneThrough relation
Route::get('/allstudent', [TeacherController::class,'getAllStudent']);
Route::get('/allclassroom', [TeacherController::class,'getAllClassRoom']);
Route::get('/allteacher', [TeacherController::class,'getAllTeacher']);

// use hasManyThrough, hasMany relation
Route::get('/alldepartment', [TeacherController::class,'getAllDepartment']);
Route::get('/allattendance', [TeacherController::class,'getAllAttendance']);

Route::get('/adddepartment', [TeacherController::class,'addDepartment']);
Route::get('/addclassroom', [TeacherController::class,'addClassRoom']);
Route::get('/addTeacher', [TeacherController::class,'addTeacher']);
Route::get('/addstudent', [TeacherController::class,'addStudent']);
Route::get('/addattendance', [TeacherController::class,'addAttendance']);
Route::get('/addimage', [TeacherController::class,'addImage']);
Route::get('/addsubject', [TeacherController::class,'addSubject']);

// One To One
Route::get('/getstudent/{id}', [TeacherController::class,'getStudent']);

// One To Many
Route::get('/getclassroomstudent/{id}', [TeacherController::class,'getClassroomStudent']);
Route::get('/getdipartment/{id}', [TeacherController::class,'getdipartment']);

// Many To Many
Route::get('/getteacher/{id}', [TeacherController::class,'getteacher']);
Route::get('/getclassroomteacher/{id}', [TeacherController::class,'getClassRoomTeacher']);

// One To Many polymorphic
Route::get('/getstudentimage/{id}', [TeacherController::class,'getStudentImage']);

// One To One polymorphic
Route::get('/getteacherimage/{id}', [TeacherController::class,'getTeacherImage']);


// Many To Many polymorpic
Route::get('/getteachersubject/{id}', [TeacherController::class,'getTeacherSubject']);
Route::get('/getstudentsubject/{id}', [TeacherController::class,'getStudentSubject']);
Route::get('/getsubjectstudent/{id}', [TeacherController::class,'getSubjectStudent']);

