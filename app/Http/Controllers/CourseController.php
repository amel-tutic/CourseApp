<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getAll(){
        
        return view('courses', [
            'heading' => 'Latest Courses',
            // 'courses' => Course::all()
            'courses' => Course::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function getById(Course $course){
        return view('course', [
            'course' => $course
        ]);
    }
}
