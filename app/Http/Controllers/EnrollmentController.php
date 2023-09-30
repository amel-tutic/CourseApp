<?php

namespace App\Http\Controllers;

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

        if(!$enrollments){
        Enrollment::create($formFields);
        }
        else return back()->with('message', 'You are already enrolled in this course.');

        return redirect("/courses")->with('message', 'Succesfully Enrolled!');
    }
}
