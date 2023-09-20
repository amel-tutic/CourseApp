@extends('layout')

@section('content')

<link rel="stylesheet" href="/css/courses.css">

<div class="courses">
<h1>{{$heading}}</h1>

@unless (count($courses) == 0)

@foreach($courses as $course)
<h2>
    <a href="/courses/{{$course->id}}">{{$course->title}}</a>
</h2>
<p>
    {{$course->description}}
</p>
@endforeach

@else
<p>No courses found</p>

@endunless
</div>
@endsection


