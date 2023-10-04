<link rel="stylesheet" href="{{asset('css/questions/questions.css')}}">

@php
$flag = request('flag');
$courseid = request('course');
@endphp

<x-layout>
    <div class="mainQuestions">
       
        @if($flag)
        <div class="windowoptionsDelete">
            <div class="optionsDelete">
                <h3>Are you sure?</h3>
        <form method="POST" action="/questions/{{$flag}}">
         @csrf
         @method('DELETE')
    
             <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Confirm</button>
             
            </form>
            <a href="/questions/manage?course={{$courseid}}">
                <button style="background-color: #192d2e; color:white; padding:0.5em; margin-top:1em">Cancel</button></a>
            </div>
        </div>
        @else

        <h1>Manage Test</h1>
  
    <table class="courses-table">
        <tbody>
            @unless ($questions->isEmpty())   
            @foreach ($questions as $question)
            <tr>
                <td class="button-cell">
                    <a style="text-decoration: none; color:black;" href="/questions/{{$question->id}}">{{$question->question}}</a>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/questions/{{$question->id}}/edit?course={{$question->course_id}}">
                        <button class="full-width-button">Edit</button></a>
                    </div>
                </td>
                <td class="button-cell">
                    <div class="full-width-button-container">
                    <a href="/questions/manage?course={{$question->course_id}}&flag={{$question->id}}">
                        <button class="full-width-button">Delete</button>
                    </a>
                    </div>
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
        <button class="buttonQuestions">+ Add new question</button>
    </a>



    
    <a href="/courses/manage">
        <button class="backQuestions"><i class="fa-solid fa-arrow-left"></i> Back</button>
    </a>
    
    @endif
</div>
</x-layout>