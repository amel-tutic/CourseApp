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
}
