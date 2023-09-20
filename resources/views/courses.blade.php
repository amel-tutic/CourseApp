<x-layout>

<link rel="stylesheet" href="/css/courses.css">


<h1>{{$heading}}</h1>

@unless (count($courses) == 0)

@foreach($courses as $course)
<x-course-card :course="$course"/>
@endforeach

@else
<p>No courses found</p>

@endunless

</x-layout>
