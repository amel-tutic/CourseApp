<x-layout>
<div class="lessonsMain">
    <link rel="stylesheet" href="{{asset('css/lessons/manage.css')}}">

    <div style="display: flex; justify-content:center;">
      <h1>Start Lessons</h1>
    </div>


@php
    $lessonnumber = 0
@endphp

    <table class="lessons-table">
        <tbody>
            @unless ($lessons->isEmpty())   
            @foreach ($lessons as $lesson)
            <tr>
                <td class="button-cell">
                    <a style="text-decoration:none; color:black;" class="titleLessons" href="/lessons/{{$lesson->id}}">
                        Lesson {{++$lessonnumber}}: {{$lesson->title}}
                    </a>
                </td>

                @auth
                @if (auth()->user()->role == 'professor' || auth()->user()->role =='admin') 
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/lessons/{{$lesson->id}}/edit?course={{$lesson->course_id}}">
                        <button class="full-width-button">Edit</button>
                    </a>
                    </div>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/lessons/manage?course={{$lesson->course_id}}&flag={{$lesson->id}}">
                        <button  class="full-width-button">Delete</button>
                    </a>
                    </div>
                </td>
                @endif
                @endauth
            </tr>
            @endforeach
            @else
            <tr>
                <td>You don't have any lessons yet.</td>
            </tr>
            @endunless
        </tbody>
    </table>

    <a href="/enroll/manage?userid={{auth()->user()->id}}">
        <button class="back" style="background-color: #192d2e; color:white; padding:0.5em;">
            <i class="fa-solid fa-arrow-left"></i> Back</button>
    </a>

    @if(auth()->user()->role == 'admin' || auth()->user()->role == 'professor')
    <div style="display: flex; justify-content:center">
    <a href="/lessons/create?course={{request('course')}}">
        <button style="background-color: rgb(78, 75, 75); color:white; border-radius:5px; padding:1em; margin-top:1em">+ Add new lesson</button>
    </a>
    </div>



    @endif

    @php
        $flag = request('flag');
        $courseid = request('course');
    @endphp

    @if($flag)
    <form method="POST" action="/lessons/{{$flag}}">
     @csrf
     @method('DELETE')

         <button>Confirm</button>
         
        </form>
        <a href="/lessons/manage?course={{$courseid}}"><button>Cancel</button></a>
    @endif

</div>
</x-layout>