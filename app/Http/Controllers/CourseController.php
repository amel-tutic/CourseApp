<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function getAll(){
        
        return view('courses.courses', [
            'heading' => 'Latest Courses',
            // 'courses' => Course::all()
            'courses' => Course::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    public function getById(Course $course){
        return view('courses.course', [
            'course' => $course
        ]);
    }

    public function create(){
        return view('courses.create');
    }

    public function store(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('courses', 'title')],
            'description' => 'required',
            'tags' => 'required',
            'duration' => 'required'
        ]);

        Course::create($formFields);

        return redirect('/courses');
    }
}
