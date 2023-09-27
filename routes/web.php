<?php

use App\Http\Controllers\CourseController;
use App\Models\Course;
use Illuminate\Support\Facades\Route;

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

//get all courses
Route::get('/courses', [CourseController::class, 'getAll']);

//get create form
Route::get('/courses/create', [CourseController::class, 'create']);

//post a new course
Route::post('/courses', [CourseController::class, 'store']);

//get edit form
Route::get('/courses/{course}/edit' , [CourseController::class, 'edit']);

//update course
Route::put('/courses/{course}', [CourseController::class, 'update']);

//get a single course
Route::get('/courses/{course}', [CourseController::class, 'getById']);