<link rel="stylesheet" href="/css/courses.css">

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

    @if($flag)
    <form method="POST" action="/courses/{{$flag}}">
     @csrf
     @method('DELETE')

         <button>Confirm</button>
         
        </form>
        <a href="/courses/manage"><button>Cancel</button></a>
    @endif

</x-layout>