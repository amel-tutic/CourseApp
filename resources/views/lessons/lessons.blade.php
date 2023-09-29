<x-layout>

    <link rel="stylesheet" href="/css/courses.css">


    @unless (count($lessons) == 0)

    @foreach($lessons as $lesson)

        <h2>{{$lesson->title}}</h2>

        <p>{{$lesson->description}}</p>

        <span>{{$lesson->content}}</span>

        <img class="image"
         src="{{$lesson->image ? asset('storage/' . $lesson->image) : asset('/storage/images/no-image.jpg')}}">

    @endforeach

    @else
    <p>No lessons found</p>

    @endunless  

</x-layout>