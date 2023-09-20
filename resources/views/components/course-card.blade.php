@props(['course'])

<x-card>
<h2>
    <a href="/courses/{{$course->id}}">{{$course->title}}</a>
</h2>
<p>
    {{$course->description}}
</p>
<x-course-tags :tagsProp="$course->tags" />

</x-card>