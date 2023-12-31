<link rel="stylesheet" href="{{asset('css/coursecard.css')}}">

@props(['course'])



<div class="card">

    <img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">
<h2 class="courseTitle">
    <a href="/courses/{{$course->id}}">{{$course->title}}</a>
</h2>

<p>
    {{$course->description}}
</p>

<div class="tagsDiv">
<x-course-tags :tagsProp="$course->tags" />
</div>

@auth
@if(auth()->user()->role == 'student')
<div>
<form method="POST" action="/enroll?course={{$course->id}}&userid={{auth()->user()->id}}">
    @csrf
    <button style="width:10%; background-color:#192d2e; color:white;">Enroll</button>    
</div>
</form>
@endif
@endauth
</div>

