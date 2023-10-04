<link rel="stylesheet" href="{{asset('css/courses/course.css')}}">

<x-layout>
<div class="mainCourse">
    <div class="infoCourse">


<img class="imageCourse" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">

<h1>{{$course->title}}</h1>

<p>{{$course->description}}</p>

<a href="/enroll/manage/?userid={{auth()->user()->id}}">
    <button class="backCourse"><i class="fa-solid fa-arrow-left"></i> Back</button>
</a>


@auth
@if(auth()->user()->role == 'student')
<form method="POST" action="/enroll?course={{$course->id}}&userid={{auth()->user()->id}}">
    @csrf
    <button style="background-color: #192d2e; color:white; padding:0.5em;">Enroll</button>    
</form>
@endif
@endauth

</div>
</div>
</x-layout>
