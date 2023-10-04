<link rel="stylesheet" href="{{asset('/css/courses/manage.css')}}">

@php
$flag = request('flag');
@endphp

<x-layout>
 
    @if($flag)
    
    <div class="windowoptionsDelete">
    <div class="optionsDelete">
        <h3>Are you sure?</h3>
    <form method="POST" action="/courses/{{$flag}}">
     @csrf
     @method('DELETE')

         <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Confirm</button>
         
        </form>
        <a id="cancelButton" href="/courses/manage">
            <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Cancel</button></a>
    </div>
    </div>  
    @else
    <div class="manageMain">
        <h1>Manage Courses</h1>


    <table class="courses-table">
        <tbody>
            @unless ($courses->isEmpty())   
            @foreach ($courses as $course)
            <tr>
                <td class="button-cell">
                   
                    <a style="text-decoration: none; color:black" href="/courses/{{$course->id}}">{{$course->title}}</a>
                  
                </td>
                
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/courses/{{$course->id}}/edit">
                        <button class="full-width-button">Edit</button>
                    </a>
                    </div>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/courses/manage/?flag={{$course->id}}">
                        <button class="full-width-button" id="deleteButton">Delete</button>
                    </a>
                    </div>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/lessons/manage?course={{$course->id}}">
                        <button class="full-width-button">Manage lessons</button>
                    </a>
                    </div>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/questions/manage?course={{$course->id}}">
                        <button class="full-width-button">Manage test</button>
                    </a>
                    </div>
                </td>

                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/enroll/users?course={{$course->id}}&userid={{auth()->user()->id}}">
                        <button class="full-width-button">Currently enrolled</button>
                    </a>
                    </div>
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

    


<a href="/courses/create">
<button style="background-color: #192d2e; color:white; padding:1em; margin-top:1em">
    + Add new course
</button>
</a>

</div>

<a href="/courses">
    <button class="backManage" style="background-color: #192d2e; color:white; padding:0.5em; position:absolute; left:10; top:100;">
        <i class="fa-solid fa-arrow-left"></i> Back</button>
</a>

    @endif


</x-layout>
    