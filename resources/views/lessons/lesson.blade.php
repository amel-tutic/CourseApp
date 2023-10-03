<link rel="stylesheet" href="{{asset('css/lessons/lesson.css')}}">

<x-layout>

    <div class="mainLesson">
        <div class="infoLesson">
    <img class="image imageLesson" src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">
    
    <h1>{{$lesson->title}}</h1>
    
    <p>{{$lesson->description}}</p>

    <span>{{$lesson->content}}</span>

<div class="buttonsLesson">
    <div class="infoButtonsLesson">
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
    @unless(auth()->user()->role == 'professor')
   <form method="POST" action="/enroll/finish?course={{$lesson->course_id}}&userid={{auth()->user()->id}}">
    @csrf

    <button>Finish Course</button>
    

    </form>
    @endunless
    @endif
</div>
</div>

</div>
</div>
    </x-layout>
    