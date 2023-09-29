<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LessonController extends Controller
{
    public function create(){
        return view('lessons.create');
    }

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

    public function getAll(){

        return view('lessons.lessons', [
            'lessons' => Lesson::all()->where('course_id', '=', request('course'))
        ]);
    }
    
}
