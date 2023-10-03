@props(['tagsProp'])

@php
 $tags = explode(',', $tagsProp);     
@endphp

<div>
<ul style="display:flex;">
    @foreach ($tags as $tag)
        <li style="width:5em; border-radius:20px; height:2em; padding:1em; background-color:#192d2e; display:flex; justify-content: center; align-items:center; margin-left:1em;">
            <a style="text-decoration: none; color: white;" href="/courses/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>
</div>