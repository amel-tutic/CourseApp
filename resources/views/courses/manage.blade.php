<link rel="stylesheet" href="{{asset('css/courses.css')}}">

@php
$flag = request('flag');
@endphp

<x-layout>
    <x-card>

        <header>
            <h1>Manage Courses</h1>
        </header>

        <table>
            <tbody>
                @unless ($courses->isEmpty())   
                @foreach ($courses as $course)
                <tr>
                    <td>
                        <a href="/courses/{{$course->id}}">{{$course->title}}</a>
                    </td>
                    
                    <td>
                        <a href="/courses/{{$course->id}}/edit">Edit</a>
                    </td>
                    <td>
                        <a href="/courses/manage/?flag={{$course->id}}">
                            <button>Delete</button>
                        </a>
                    </td>
                    <td>
                        <a href="/lessons/manage?course={{$course->id}}">
                            <button>Manage lessons</button>
                        </a>
                    </td>
                    <td>
                        <a href="/questions/manage?course={{$course->id}}">
                            <button>Manage test</button>
                        </a>
                    </td>

                    <td>
                        <a href="/enroll/users?course={{$course->id}}&userid={{auth()->user()->id}}">
                            <button>Currently enrolled</button>
                        </a>
                    </td>

                </tr>
                @endforeach
                @else
                <tr>
                    <td>You don't have any courses.</td>
                </tr>
                @endunless
            </tbody>
        </table>

        
    </x-card>
    
    <a href="/courses/create"><button>+ Add new course</button></a>

    @if($flag)
    <form method="POST" action="/courses/{{$flag}}">
     @csrf
     @method('DELETE')

         <button>Confirm</button>
         
        </form>
        <a href="/courses/manage"><button>Cancel</button></a>
    @endif

</x-layout>