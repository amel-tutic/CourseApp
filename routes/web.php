<?php

use App\Models\Course;
use App\Http\Middleware\authStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authProfessor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\EnrollmentController;

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

//get home page
Route::get('/', function(){
    return view('home');
});


/////////////////////////////// user routes /////////////////////////////

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


/////////////////////////////// course routes ////////////////////////////////

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


////////////////////////////// lesson routes ////////////////////////////

//get lesson form
Route::get('/lessons/create', [LessonController::class, 'create'])->middleware(['auth', authProfessor::class]);

//create a new lesson
Route::post('/lessons/create', [LessonController::class, 'store'])->middleware(['auth', authProfessor::class]);

//get all lessons
Route::get('/lessons/manage', [LessonController::class, 'getAll'])->middleware(['auth', authProfessor::class]);

//get edit form
Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->middleware(['auth', authProfessor::class]);

//update a lesson
Route::put('lessons/{lesson}', [LessonController::class, 'update'])->middleware(['auth', authProfessor::class]);

//delete a lesson
Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->middleware(['auth', authProfessor::class]);

//get a single lesson
Route::get('/lessons/{lesson}', [LessonController::class, 'getById'])->middleware(['auth', authProfessor::class]);


////////////////////////////// question routes ////////////////////////////

//get question form
Route::get('/questions/create', [QuestionController::class, 'create'])->middleware(['auth', authProfessor::class]);

//create a new question
Route::post('/questions/create', [QuestionController::class, 'store'])->middleware(['auth', authProfessor::class]);

//get all questions
Route::get('/questions/manage', [QuestionController::class, 'getAll'])->middleware(['auth', authProfessor::class]);

//get edit form
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->middleware(['auth', authProfessor::class]);

//update a question
Route::put('questions/{question}', [QuestionController::class, 'update'])->middleware(['auth', authProfessor::class]);

//delete a question
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->middleware(['auth', authProfessor::class]);

//get a single qustion
Route::get('/qustions/{question}', [QuestionController::class, 'getById'])->middleware(['auth', authProfessor::class]);

//get test
Route::get('/questions/test', [QuestionController::class, 'test'])->middleware(['auth', authStudent::class]);

//generate test
Route::post('/questions/test/generate', [QuestionController::class, 'generate'])->middleware(['auth', authStudent::class]);

//evaluate test
Route::post('questions/test/evaluate', [QuestionController::class, 'evaluate'])->middleware(['auth', authStudent::class]);


/////////////////////////// enrollment routes ///////////////////////////

//enroll
Route::post('/enroll', [EnrollmentController::class, 'enroll'])->middleware(['auth', authStudent::class]);



















