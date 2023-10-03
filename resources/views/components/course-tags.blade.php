@props(['tagsProp'])

@php
 $tags = explode(',', $tagsProp);     
@endphp

<ul style="display:flex;">
    @foreach ($tags as $tag)
        <li style="width:5em; border-radius:5px; height:2em; padding:0.5em; background-color:rgb(62, 60, 60); display:flex; justify-content: center; align-items:center; margin-left:1em;">
            <a style="text-decoration: none; color: white;" href="/courses/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>