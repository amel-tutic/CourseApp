<link rel="stylesheet" href="{{asset('css/enrollments/enrollments.css')}}">

@php
    $flag = request('flag');
@endphp

<x-layout>

    @if($flag)
    
    <div class="windowoptionsDelete">
    <div class="optionsDelete">
        <h3>Are you sure?</h3>
    <form method="POST" action="/courses/{{$flag}}">
     @csrf
     @method('DELETE')

         <button class="buttonEnrollments">Confirm</button>
         
        </form>
        <a id="cancelButton" href="/enroll/manage?userid={{auth()->user()->id}}"><button class="buttonEnrollments">Cancel</button></a>
    </div>
    </div>  

    @else

  <div class="manageEnrollments">
        <h1>My Courses</h1>
   

    <table class="courses-table">
        <tbody>
        @unless ($enrollments->isEmpty()) 
        @foreach ($enrollments as $enrollment)
            
            <tr>
                {{-- <td class="button-cell">{{$enrollment->course_id}}</td> --}}

                @foreach ($courses as $course)

                    @if ($course->id == $enrollment->course_id)
                    <td class="button-cell">
                        <a class="titleEnrollments" style="text-decoration: none; color:black;" href="/courses/{{$course->id}}">
                        {{$course->title}}</a>
                    </td>

                     <td class="button-cell">
                        <div class="full-width-button-container">
                        <a href="/lessons/manage?course={{$course->id}}">
                            <button class="full-width-button">Start lessons</button>
                        </a>
                        </div>
                     </td>

                     <td class="button-cell">
                        <div class="full-width-button-container">
                        <a href="/questions/test?course={{$course->id}}&userid={{$enrollment->user_id}}">
                            <button class="full-width-button">Test Yourself!</button>
                        </a>
                        </div>
                     </td>

                     <td class="button-cell">
                        <div class="full-width-button-container">
                        <a href="/enroll/manage/?userid={{auth()->user()->id}}&flag={{$enrollment->id}}">
                            <button class="full-width-button">Abandon</button></a>
                        </div>
                    </td>

                     <td class="button-cell">
                        <div class="full-width-button-container">
                        <a href="/questions/final?course={{$course->id}}&userid={{$enrollment->user_id}}&finished={{$enrollment->finished_lessons}}">
                            <button class="full-width-button">Final test</button></a>
                        </div>
                    </td>

                        @if($enrollment->finished_course == 1)
                            <td class="button-cell">
                                <p>You have finished this course.</p>
                            </td>
                        @endif  
                  
                                   
                    @endif
                
                @endforeach
            </tr>

        @endforeach
        
        @else
        <tr>
            <h2>You are not enrolled in any courses yet!</h2>
        </tr>
        @endunless
    </tbody>
    </table>

<div class="buttonsEnrollments">
<div class="infoButtonsEnrollments">
<a href="/courses"><button class="buttonEnrollments">Find more courses!</button></a>
<a href="/enroll/history?userid={{auth()->user()->id}}"><button class="buttonEnrollments">My history of courses</button></a>
</div>
</div>

<a href="/courses"><button class="buttonEnrollments back"><i class="fa-solid fa-arrow-left"></i> Back</button></a>

</div>

@endif
</x-layout>

