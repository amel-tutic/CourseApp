<?php

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Middleware\authAdmin;
use App\Http\Middleware\authStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authProfessor;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Password;
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

//get all users
Route::get('/users/manage', [UserController::class, 'manage'])->middleware(['auth', authAdmin::class]);

//delete user
Route::delete('/users/{user}', [UserController::class, 'destroy'])->middleware(['auth', authAdmin::class]);

//get user profile
Route::get('/users/profile/{user}', [UserController::class, 'profile'])->middleware('auth');

//get change password form
Route::get('/users/changePassword/{user}', [UserController::class, 'changePasswordForm'])->middleware('auth');

//change password
Route::put('/users/changePassword/{user}', [UserController::class, 'changePassword'])->middleware('auth');


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
Route::get('/lessons/manage', [LessonController::class, 'getAll'])->middleware(['auth', authStudent::class]);

//get edit form
Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->middleware(['auth', authProfessor::class]);

//update a lesson
Route::put('lessons/{lesson}', [LessonController::class, 'update'])->middleware(['auth', authProfessor::class]);

//delete a lesson
Route::delete('/lessons/{lesson}', [LessonController::class, 'destroy'])->middleware(['auth', authProfessor::class]);

//get a single lesson
Route::get('/lessons/{lesson}', [LessonController::class, 'getById'])->middleware(['auth', authStudent::class]);


////////////////////////////// question routes ////////////////////////////

//get question form
Route::get('/questions/create', [QuestionController::class, 'create'])->middleware(['auth', authProfessor::class]);

//create a new question
Route::post('/questions/create', [QuestionController::class, 'store'])->middleware(['auth', authProfessor::class]);

//get all questions
Route::get('/questions/manage', [QuestionController::class, 'getAll'])->middleware(['auth', authProfessor::class]);

//get edit form
Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->middleware(['auth', authProfessor::class]);

/////// test route ///////
//get test
Route::get('/questions/test', [QuestionController::class, 'test'])->middleware(['auth', authStudent::class]);

//generate test
Route::post('/questions/test/generate', [QuestionController::class, 'generate'])->middleware(['auth', authStudent::class]);

//evaluate test
Route::post('/questions/test/evaluate', [QuestionController::class, 'evaluate'])->middleware(['auth', authStudent::class]);

//generate final test
Route::get('/questions/final', [QuestionController::class, 'final'])->middleware(['auth', authStudent::class]);

//evaluate final test
Route::post('/questions/final/evaluate', [QuestionController::class, 'finalEvaluate'])->middleware(['auth', authStudent::class]);
////// end tests routes //////

//update a question
Route::put('/questions/{question}', [QuestionController::class, 'update'])->middleware(['auth', authProfessor::class]);

//delete a question
Route::delete('/questions/{question}', [QuestionController::class, 'destroy'])->middleware(['auth', authProfessor::class]);

//get a single question
Route::get('/questions/{question}', [QuestionController::class, 'getById'])->middleware(['auth', authProfessor::class]);

/////////////////////////// enrollment routes ///////////////////////////

//enroll
Route::post('/enroll', [EnrollmentController::class, 'enroll'])->middleware(['auth', authStudent::class]);


//get enrolled courses
Route::get('/enroll/manage', [EnrollmentController::class, 'getCourses'])->middleware(['auth', authStudent::class]);

//delete enrollment
Route::delete('/enroll/{enrollment}', [EnrollmentController::class, 'destroy'])->middleware(['auth', authStudent::class]);

//finish course
Route::post('/enroll/finish', [EnrollmentController::class, 'finish'])->middleware(['auth', authStudent::class]);

//get enroll history
Route::get('/enroll/history', [EnrollmentController::class, 'history'])->middleware(['auth', authStudent::class]);

//get currently enrolled users
Route::get('/enroll/users', [EnrollmentController::class, 'users'])->middleware(['auth', authProfessor::class]);


////////////////////////////////// password reset //////////////////////////////////

// //get form
// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// //send email
// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);
 
//     $status = Password::sendResetLink(
//         $request->only('email')
//     );
 
//     return $status === Password::RESET_LINK_SENT
//                 ? back()->with(['status' => __($status)])
//                 : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');

// //get token
// Route::get('/reset-password/{token}', function (string $token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');









