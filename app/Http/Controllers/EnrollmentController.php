<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    //get enroll
    public function enroll(Request $request){
        $courseid = request('course');
        $userid = request('userid');

        $formFields = [
            'course_id' => $courseid,
            'user_id' => $userid
        ];

        $enrollments = Enrollment::all()->where('course_id', $courseid)->where('user_id', $userid);

        if($enrollments->isEmpty()){
        Enrollment::create($formFields);
        }
        else return back()->with('message', 'You are already enrolled in this course.');

        return redirect("/courses")->with('message', 'Succesfully Enrolled!');
    }

    //get enrolled courses
    public function getCourses(){

        $userid = request('userid');
        $enrollments = Enrollment::all()->where('user_id', $userid);

        $courses = [];

        foreach($enrollments as $enrollment){
            $course = Course::find($enrollment->course_id);
            array_push($courses, $course);
            
        }
        
        if(auth()->user()->id != $userid){
            return back()->with('message', 'Unauthorized access!');
        }
        
        return view('enrollments.enrollments', [
            'enrollments' => $enrollments,
            'courses' => $courses
        ]);
    }

    //delete enrollment
    public function destroy(Enrollment $enrollment){
        $userid = request('userid');

        if(auth()->user()->id != $userid){
            return back()->with('message', 'Unauthorized access!');
        }

        $enrollment->delete();
        
        return redirect("/enroll/manage?userid=$userid")->with('message', 'Successfully abandoned course');
    }

    //finish lessons
    public function finish(Request $request){
        $enrollment = Enrollment::where('user_id', $request['userid'])->where('course_id', $request['course'])->get()->first();

        $enrollment->finished_lessons = 1;

        $enrollment->lessons_attempts++;

        $enrollment->save();

        if($enrollment->lessons_attempts < 2)
            return redirect("/enroll/manage?userid=$enrollment->user_id")->with('message', 'You finished the course. Test Yourself!');

        else
            return redirect("/enroll/manage?userid=$enrollment->user_id");

    }

    //get enroll history
    public function history(){
        $history = Enrollment::all()->where('user_id', request('userid'))->where('finished_course', '1');

        $courses = [];

        foreach($history as $record){
            $course = Course::find($record->course_id);
            array_push($courses, $course);
            
        }

        return view('enrollments.history', [
            'history' => $history,
            'courses' => $courses
        ]);
    }

    //get currently enrolled users
    public function users(){
        $userid = request('userid');
        $courseid = request('course');

        $users = [];

        $course = Course::where('user_id', $userid)->get()->first();
      
        $enrollments = Enrollment::all()->where('course_id', $courseid);

            foreach($enrollments as $enrollment){
                if($course->id == $enrollment->course_id){
                    $user = User::where('id', $enrollment->user_id)->get()->first();
                    array_push($users, $user);
                }
            } 
          

            return view('enrollments.users', [
                'users' => $users
            ]);
    }
}
