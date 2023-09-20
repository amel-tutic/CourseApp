<?php

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

Route::get('/', function () {
    return view('layout');
});

Route::get('/courses', function() {
    return view('courses', [
        'heading' => 'Latest Courses',
        'courses' => Course::all()
    ]);
});

Route::get('/courses/{course}', function (Course $course) {
    return view('course', [
        'course' => $course
    ]);
});