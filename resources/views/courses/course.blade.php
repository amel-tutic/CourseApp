<x-layout>

<x-card>
<link rel="stylesheet" href="{{asset('css/courses.css')}}">

<img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">

<h1>{{$course->title}}</h1>

<p>{{$course->description}}</p>


@auth
<form method="POST" action="/enroll?course={{$course->id}}&userid={{$userid}}">
    @csrf
    <button>Enroll</button>    
</form>
@endauth
</x-card>

</x-layout>
