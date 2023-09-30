<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //get create form
    public function create(){
        return view('questions.create');
    }

    //create a question
    public function store(Request $request){
        $formFields = $request->validate([
            'question' => ['required'],
            'answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'difficulty' => 'required'
        ]);

        $formFields['course_id'] = $request['course'];
        $courseid= $request['course'];
        
        Question::create($formFields);

        return redirect("/questions/manage?course=$courseid")->with('message', "Question created successfully!");
    }

    //get all questions
    public function getAll(){

        return view('questions.questions', [
            'questions' => Question::all()->where('course_id', '=', request('course')),
            'courseid' => request('course')
        ]);
    }

    //edit a question
    public function edit(Question $question){
        return view('questions.edit', ['question' => $question]);
    }

    //update a question
    public function update(Request $request, Question $question){


        $formFields = $request->validate([
            'question' => ['required'],
            'answer' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'difficulty' => 'required'
        ]);

        $question->update($formFields);

        return redirect("/questions/manage?course=$question->course_id")->with('message', "Question updated successfully!");
    } 
    
    //delete a question
    public function destroy(Question $question){
        $question->delete();
        return redirect("/questions/manage?course=$question->course_id")->with('message', 'Question deleted successfully!');
    }

    public function getById(Question $question){
        return view('questions.question', [
            'question' => $question
        ]);
    }

    //get test
    public function test(){
        return view('questions.test', [
            'course' => request('course')
        ]);
    }



}
