<?php

use App\Models\Course;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Middleware\authProfessor;

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
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//create a new user
Route::post('/users', [UserController::class, 'store']);

//log out user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//get login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//log in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



//get all courses
Route::get('/courses', [CourseController::class, 'getAll']);

//get create form
Route::get('/courses/create', [CourseController::class, 'create'])->middleware(['auth', authProfessor::class]);

//create a new course
Route::post('/courses', [CourseController::class, 'store'])->middleware(['auth', authProfessor::class]);

//get edit form
Route::get('/courses/{course}/edit' , [CourseController::class, 'edit'])->middleware(['auth', authProfessor::class]);

//update course
Route::put('/courses/{course}', [CourseController::class, 'update'])->middleware(['auth', authProfessor::class]);

//delete a course
Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->middleware(['auth', authProfessor::class]);

//get manage courses
Route::get('/courses/manage', [CourseController::class, 'manage'])->middleware(['auth', authProfessor::class]);

//get a single course
Route::get('/courses/{course}', [CourseController::class, 'getById']);  
