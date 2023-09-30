<x-layout>

    <link rel="stylesheet" href="{{asset('css/courses.css')}}">

    <header>
        <h1>Manage Lessons</h1>
    </header>

    <table>
        <tbody>
            @unless ($lessons->isEmpty())   
            @foreach ($lessons as $lesson)
            <tr>
                <td>
                    <a href="/lessons/{{$lesson->id}}">{{$lesson->title}}</a>
                </td>
                <td>
                    <a href="/lessons/{{$lesson->id}}/edit?course={{$lesson->course_id}}">Edit</a>
                </td>
                <td>
                    <a href="/lessons/manage?course={{$lesson->course_id}}&flag={{$lesson->id}}">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>You don't have any lessons yet.</td>
            </tr>
            @endunless
        </tbody>
    </table>
    <a href="/lessons/create?course={{request('course')}}">
        <button>+ Add new lesson</button>
    </a>

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

</x-layout>