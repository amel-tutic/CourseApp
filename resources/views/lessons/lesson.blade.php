<x-layout>

    <link rel="stylesheet" href="{{asset('css/courses.css')}}">
    
    <img class="image" src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">
    
    <h1>{{$lesson->title}}</h1>
    
    <p>{{$lesson->description}}</p>

    <span>{{$lesson->content}}</span>


    @php
        if(!$next_record) {
            $next_record = $lesson;
        }
    @endphp

    <a href="/lessons/{{$next_record->id}}">
    <button>Next Lesson</button>
    </a>

    </x-layout>
    