<x-layout>

<link rel="stylesheet" href="{{asset('css/courses/courses.css')}}">

<h1>{{$heading}}</h1>

@include('partials._search')

@unless (count($courses) == 0)

<div class="coursesList">
@foreach($courses as $course)
<x-course-card :course="$course"/>
@endforeach
</div>

@else
<p>No courses found</p>

@endunless

<div class="paginationLinks">
    {{$courses->links()}}
</div>

</x-layout>

