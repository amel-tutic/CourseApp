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

Route::get('/courses', [CourseController::class, 'getAll']);

Route::get('/courses/create', [CourseController::class, 'create']);

Route::post('/courses', [CourseController::class, 'store']);

Route::get('/courses/{course}', [CourseController::class, 'getById']);