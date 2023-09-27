<x-layout>

<x-card>
<link rel="stylesheet" href="/css/courses.css">

<img class="image" src="{{$course->image ? asset('storage/' . $course->image) : asset('/storage/images/no-image.jpg')}}" alt="">

<h1>{{$course->title}}</h1>

<p>{{$course->description}}</p>
</x-card>

<x-card>
    <a href="/courses/{{$course->id}}/edit">
        <i>Edit</i>
    </a>
</x-card>

</x-layout>