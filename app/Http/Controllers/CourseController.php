<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getAll(){
        return view('courses', [
            'heading' => 'Latest Courses',
            'courses' => Course::all()
        ]);
    }

    public function getById(Course $course){
        return view('course', [
            'course' => $course
        ]);
    }
}
