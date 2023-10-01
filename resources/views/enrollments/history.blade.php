 <link rel="stylesheet" href="{{asset('css/courses.css')}}">

<x-layout>

    <x-card>

        <header>
            <h1>History of my courses</h1>
        </header>

        <table>
            <tbody>
            @unless ($history->isEmpty()) 
            @foreach ($history as $record)
                
                <tr>
                    <td>{{$record->course_id}}</td>
    
                    @foreach ($courses as $course)
    
                        @if ($course->id == $record->course_id)
                        <td><a href="/courses/{{$course->id}}">{{$course->title}}</a></td>
                                                             
                        @endif
                    
                    @endforeach
                </tr>
    
            @endforeach
            
            @else
            <tr>
                <h2>You have not finished in any courses yet!</h2>
            </tr>
            @endunless
        </tbody>
        </table>
    
    </x-card>

<a href="/enroll/manage?userid={{auth()->user()->id}}"><button>Back</button></a>

<a href="/courses"><button>Find more courses!</button></a>


</x-layout>