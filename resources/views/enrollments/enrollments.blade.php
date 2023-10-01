<link rel="stylesheet" href="{{asset('css/courses.css')}}">

@php
    $flag = request('flag');
@endphp

<x-layout>

    <x-card>

    <header>
        <h1>My Courses</h1>
    </header>

    <table>
        <tbody>
        @unless ($enrollments->isEmpty()) 
        @foreach ($enrollments as $enrollment)
            
            <tr>
                <td>{{$enrollment->course_id}}</td>

                @foreach ($courses as $course)

                    @if ($course->id == $enrollment->course_id)
                    <td><a href="/courses/{{$course->id}}">{{$course->title}}</a></td>

                     <td>
                        <a href="/lessons/manage?course={{$course->id}}">
                            <button>Start lessons</button>
                        </a>
                     </td>

                     <td>
                        <a href="/questions/test?course={{$course->id}}&userid={{$enrollment->user_id}}">
                            <button>Test Yourself!</button>
                        </a>
                     </td>

                     <td>
                        <a href="/enroll/manage/?userid={{auth()->user()->id}}&flag={{$enrollment->id}}"><button>Abandon</button></a>
                     </td>

                     <td>
                        <a href="/questions/final?course={{$course->id}}&userid={{$enrollment->user_id}}&finished={{$enrollment->finished_lessons}}"><button>Final test</button></a>
                     </td>

                        @if($enrollment->finished_course == 1)
                            <td>
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

    </x-card>

<a href="/courses"><button>Find more courses!</button></a>
<a href="/enroll/history?userid={{auth()->user()->id}}"><button>My history of courses</button></a>


    @if($flag)
    <form method="POST" action="/enroll/{{$flag}}?userid={{auth()->user()->id}}">
     @csrf
     @method('DELETE')

         <button>Confirm</button>
         
        </form>
        <a href="/enroll/manage?userid={{auth()->user()->id}}"><button>Cancel</button></a>
    @endif

</x-layout>

