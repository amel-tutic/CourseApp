<x-layout>

    <link rel="stylesheet" href="{{asset('css/courses.css')}}">
    
    <img class="image" src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">
    
    <h1>{{$lesson->title}}</h1>
    
    <p>{{$lesson->description}}</p>

    <span>{{$lesson->content}}</span>


    @if($flag != 1)
    <a href="/lessons/{{$previous_record->id}}">
    <button>Previous Lesson</button>
    </a>
    
    @else
    <a href="/lessons/manage?course={{$lesson->course_id}}">
        <button>Back to lessons</button>
    @endif

    @if($flagn != 1)
    <a href="/lessons/{{$next_record->id}}">
    <button>Next Lesson</button>
    </a>

    @else
   <form method="POST" action="/enroll/finish?course={{$lesson->course_id}}&userid={{auth()->user()->id}}">
    @csrf

    <button>Finish Course</button>

    </form>

    @endif
    </x-layout>
    