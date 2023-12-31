<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    //get all courses
    public function getAll(){
        
        return view('courses.courses', [
            'heading' => 'Latest Courses',
            // 'courses' => Course::all()
            'courses' => Course::latest()->filter(request(['tag', 'search']))->paginate(4)
        ]);
    }

    //get a single course
    public function getById(Course $course){
        return view('courses.course', [
            'course' => $course
        ]);
    }

    //get create form
    public function create(){
        return view('courses.create');
    }

    //create a new course
    public function store(Request $request){
        // dd($request->all());
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('courses', 'title')],
            'description' => 'required',
            'tags' => 'required',
            'duration' => 'required'
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['user_id'] = auth()->id();
        
        Course::create($formFields);

        return redirect('/courses/manage')->with('message', "Course created successfully!");
    }

    //get edit form
    public function edit(Course $course){
        return view('courses.edit', ['course' => $course]);
    }

    //update course
    public function update(Request $request, Course $course){
        // dd($request->all());

        //check if logged in user is the owner of the course
        if($course->user_id != auth()->id()){
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => ['required'],
            'description' => 'required',
            'tags' => 'required',
            'duration' => 'required'
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $course->update($formFields);

        return redirect('/courses/manage')->with('message', "Course updated successfully!");
    } 

    //delete course
    public function destroy(Course $course){

        //check if logged in user is the owner of the course
        if($course->user_id != auth()->id()){
            abort(403, 'Unauthorized action');
        }

         $course->delete();
        return redirect('/courses/manage')->with('message', 'Course deleted successfully!');
    }

    //get manage page
    public function manage(){
        $courses = auth()->user()->courses;
        return view('courses.manage', ['courses' => $courses]);
    }

}
