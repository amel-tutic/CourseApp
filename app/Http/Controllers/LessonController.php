<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Termwind\Components\Li;

class LessonController extends Controller
{
    //get create form
    public function create(){
        return view('lessons.create');
    }

    //create a lesson
    public function store(Request $request){
        $formFields = $request->validate([
            'title' => ['required', Rule::unique('lessons', 'title')],
            'description' => 'required',
            'content' => 'required'
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $formFields['course_id'] = $request['course'];
        
        Lesson::create($formFields);

        return redirect('/courses/manage')->with('message', "Lesson created successfully!");
    }

    //get all lessons
    public function getAll(){

        return view('lessons.lessons', [
            'lessons' => Lesson::all()->where('course_id', '=', request('course')),
            'courseid' => request('course')
        ]);
    }

    //edit a lesson
    public function edit(Lesson $lesson){
        return view('lessons.edit', ['lesson' => $lesson]);
    }

    //update a lesson
    public function update(Request $request, Lesson $lesson){


        $formFields = $request->validate([
            'title' => ['required'],
            'description' => 'required',
            'content' => 'required',
        ]);

        if($request->hasFile('image')){ 
            $formFields['image'] = $request->file('image')->store('images', 'public');
        }

        $lesson->update($formFields);

        return redirect("/lessons/manage?course=$lesson->course_id")->with('message', "Lesson updated successfully!");
    } 
    
    //delete a lesson
    public function destroy(Lesson $lesson){
        $lesson->delete();
        return redirect("/lessons/manage?course=$lesson->course_id")->with('message', 'Lesson deleted successfully!');
    }

}
