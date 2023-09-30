@props(['course'])

<x-card>
    <img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">
<h2>
    <a href="/courses/{{$course->id}}">{{$course->title}}</a>
</h2>
<p>
    {{$course->description}}
</p>
<x-course-tags :tagsProp="$course->tags" />

@auth
<form method="POST" action="/enroll?course={{$course->id}}&userid={{auth()->user()->id}}">
    @csrf
    <button>Enroll</button>    
</form>
@endauth


</x-card>