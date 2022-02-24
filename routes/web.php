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


Route::get('/allstudent', [TeacherController::class,'getAllStudent']);
Route::get('/allclassroom', [TeacherController::class,'getAllClassRoom']);
Route::get('/allteacher', [TeacherController::class,'getAllTeacher']);
Route::get('/alldepartment', [TeacherController::class,'getAllDepartment']);

Route::get('/adddepartment', [TeacherController::class,'addDepartment']);
Route::get('/addclassroom', [TeacherController::class,'addClassRoom']);
Route::get('/addTeacher', [TeacherController::class,'addTeacher']);
Route::get('/addstudent', [TeacherController::class,'addStudent']);

// One To One
Route::get('/getstudent/{id}', [TeacherController::class,'getstudent']);

// One To Many
Route::get('/getclassroom/{id}', [TeacherController::class,'getclassroom']);
Route::get('/getdipartment/{id}', [TeacherController::class,'getdipartment']);

// Many To Many
Route::get('/getteacher/{id}', [TeacherController::class,'getteacher']);
Route::get('/getlassroomteacher/{id}', [TeacherController::class,'getClassRoomTeacher']);
