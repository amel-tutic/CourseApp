<x-layout>

    <link rel="stylesheet" href="{{asset('css/courses.css')}}">

    <header>
        <h1>Manage Test</h1>
    </header>

    <table>
        <tbody>
            @unless ($questions->isEmpty())   
            @foreach ($questions as $question)
            <tr>
                <td>
                    <a href="/questions/{{$question->id}}">{{$question->question}}</a>
                </td>
                <td>
                    <a href="/questions/{{$question->id}}/edit?course={{$question->course_id}}">Edit</a>
                </td>
                <td>
                    <a href="/questions/manage?course={{$question->course_id}}&flag={{$question->id}}">
                        <button>Delete</button>
                    </a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td>You don't have any questions yet.</td>
            </tr>
            @endunless
        </tbody>
    </table>
    <a href="/questions/create?course={{request('course')}}">
        <button>+ Add new question</button>
    </a>

    @php
        $flag = request('flag');
        $courseid = request('course');
    @endphp

    @if($flag)
    <form method="POST" action="/questions/{{$flag}}">
     @csrf
     @method('DELETE')

         <button>Confirm</button>
         
        </form>
        <a href="/questions/manage?course={{$courseid}}"><button>Cancel</button></a>
    @endif

</x-layout>