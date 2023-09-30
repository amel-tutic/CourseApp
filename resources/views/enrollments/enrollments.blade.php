<link rel="stylesheet" href="{{asset('css/courses.css')}}">

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

</x-layout>