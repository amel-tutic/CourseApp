<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });

//get register form
Route::get('/register', [UserController::class, 'create']);

//create a new user
Route::post('/users', [UserController::class, 'store']);

//log out user
Route::post('/logout', [UserController::class, 'logout']);

//get login form
Route::get('/login', [UserController::class, 'login']);

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//get all courses
Route::get('/courses', [CourseController::class, 'getAll']);

//get create form
Route::get('/courses/create', [CourseController::class, 'create']);

//create a new course
Route::post('/courses', [CourseController::class, 'store']);

//get edit form
Route::get('/courses/{course}/edit' , [CourseController::class, 'edit']);

//update course
Route::put('/courses/{course}', [CourseController::class, 'update']);

//delete a course
Route::delete('/courses/{course}', [CourseController::class, 'destroy']);

//get a single course
Route::get('/courses/{course}', [CourseController::class, 'getById']);