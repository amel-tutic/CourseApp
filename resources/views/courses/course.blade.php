<x-layout>

<x-card>
<link rel="stylesheet" href="{{asset('css/courses.css')}}">

<img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">

<h1>{{$course->title}}</h1>

<p>{{$course->description}}</p>

<form method="POST" action="/enroll?course={{$course->id}}&userid={{auth()->user()->id}}">
    @csrf
    <button>Enroll</button>    
</form>

</x-card>

</x-layout>
